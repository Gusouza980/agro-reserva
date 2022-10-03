<?php

namespace App\Http\Livewire\Painel\Vendas;

use Livewire\Component;
use App\Models\Cliente;
use App\Models\Venda;
use App\Models\VendaParcela;
use App\Models\Lote;
use Livewire\WithPagination;
use App\Models\Carrinho;
use App\Models\CarrinhoProduto;
use Livewire\WithFileUploads;
use App\Classes\Util;

class ModalCadastroVenda extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $filtro_clientes;
    public $cliente_selecionado;

    public $filtro_lotes;
    public $lotes_selecionados;

    public $parcelas;

    public $venda;
    public $arquivo;

    public $op = "listagem_clientes";
    public $tarjar = 0;

    protected $listeners = ["carregaModalCadastroVenda", "resetaModalCadastroVenda"];

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        "venda.porcentagem_desconto" => "",
        "venda.desconto_extra" => "",
        "venda.entrada" => "",
        "venda.parcelas" => "",
        "venda.primeira_parcela" => "",
        "venda.comprovante" => "",
        "cliente_selecionado.nome_dono" => "",
    ];

    public function carregaModalCadastroVenda(){
        $this->venda = new Venda;
        $this->lotes_selecionados = collect();
        $this->parcelas = collect();
        $this->op = "listagem_clientes";
        $this->tarjar = 0;
        $this->dispatchBrowserEvent("abreModalCadastroVenda");
    }

    public function updatedVendaParcelas(){
        $this->geraParcelas();
    }

    public function updatedVendaDesconto(){
        $this->geraParcelas();
    }

    public function updatedVendaDescontoExtra(){
        $this->geraParcelas();
    }

    public function updatedVendaEntrada(){
        $this->geraParcelas();
    }

    public function updatedVendaPrimeiraParcela(){
        $this->geraParcelas();
    }

    public function geraParcelas(){
        if($this->venda->primeira_parcela && $this->venda->parcelas){
            $this->parcelas = collect();
            $qtd_parcelas = $this->venda->parcelas;
            $desconto = ($this->venda->porcentagem_desconto) ? $this->venda->porcentagem_desconto : 0;
            $desconto_extra = ($this->venda->desconto_extra) ? $this->venda->desconto_extra : 0;
            $entrada = ($this->venda->entrada) ? $this->venda->entrada : 0;
            $primeira_parcela = $this->venda->primeira_parcela;
            $total = $this->lotes_selecionados->sum("preco");
            $total = $total - ($total * $desconto / 100) - $desconto_extra - $entrada;
            $valor_parcela = $total / $qtd_parcelas;
            for($i = 1; $i <= $this->venda->parcelas; $i++){
                $this->parcelas->put($i, [
                    "valor" => $valor_parcela,
                    "vencimento" => date("Y-m-d", strtotime($primeira_parcela . " +" . ($i - 1) . " Months"))
                ]);
            }
        }        
    }

    public function selecionarCliente(Cliente $cliente){
        $this->cliente_selecionado = $cliente;
        $this->op = "informacoes_venda";
    }

    public function removerLote($key){
        $this->lotes_selecionados->pull($key);
        $this->geraParcelas();
    }

    public function selecionarLote(Lote $lote){
        $this->lotes_selecionados->put($lote->id, [
            "numero" => $lote->numero,
            "nome" => $lote->nome,
            "preco" => $lote->preco,
        ]);
        $this->geraParcelas();
    }

    public function salvar($continuar = false){
        $qtd_parcelas = $this->venda->parcelas;
        $porcentagem_desconto = ($this->venda->porcentagem_desconto) ? $this->venda->porcentagem_desconto : 0;
        $desconto_extra = ($this->venda->desconto_extra) ? $this->venda->desconto_extra : 0;
        $entrada = ($this->venda->entrada) ? $this->venda->entrada : 0;
        $primeira_parcela = $this->venda->primeira_parcela;
        $total = $this->lotes_selecionados->sum("preco");
        $desconto = $total * $porcentagem_desconto / 100;
        $total = $total - $desconto - $desconto_extra;
        $valor_parcela = ($total - $entrada) / $qtd_parcelas;

        $venda = new Venda;

        // CRIANDO A VENDA
        $venda->cliente_id = $this->cliente_selecionado->id;
        $venda->assessor_id = null;
        $venda->parcelas = $qtd_parcelas;
        $venda->total = $total;
        $venda->desconto = $desconto;
        $venda->desconto_extra = $desconto_extra;
        $venda->entrada = $entrada;
        $venda->comissao = 0;
        $venda->porcentagem_comissao = 0;
        $venda->porcentagem_desconto = $porcentagem_desconto;
        $venda->porcentagem_venda = 100;
        $venda->parcelas_mes = 1;
        $venda->valor_parcela = $valor_parcela;
        $venda->primeira_parcela = $primeira_parcela;

        if(session()->get("admin")["acesso"] == 1){
            if($this->arquivo){
                $venda->comprovante = $this->arquivo->store("admin/images/comprovantes/", 'local');
            }else{
                session()->flash("erro_arquivo", "Por favor, escolha um comprovante da decisão de compra do cliente.");
                return;
            }
            $venda->aprovada = false;
            $venda->assessor_id = session()->get("admin")["assessor_id"];
        }

        $venda->tipo = 1;

        // CRIANDO O CARRINHO E INSERINDO OS PRODUTOS
        $carrinho = new Carrinho;
        $carrinho->cliente_id = $this->cliente_selecionado->id;
        $carrinho->aberto = false;
        $carrinho->save();

        foreach($this->lotes_selecionados->keys() as $lote_id){
            $lote = Lote::find($lote_id);
            
            if($this->tarjar){
                $lote->reservado = true;
                $lote->save();
            }

            $carrinho_produto = new CarrinhoProduto;
            $carrinho_produto->carrinho_id = $carrinho->id;
            $carrinho_produto->lote_id = $lote->id;
            $carrinho_produto->produto_id = $lote->produto->id;
            $carrinho_produto->quantidade = 1;
            $carrinho_produto->total = $lote->produto->preco * $carrinho_produto->quantidade;
            $carrinho_produto->save();

            $carrinho->reserva_id = $lote->reserva_id;
            $carrinho->total += $carrinho_produto->total;
            $carrinho->save();
        }

        $venda->carrinho_id = $carrinho->id;
        $venda->save();
        $venda->codigo = str_pad($venda->id, 11, "0", STR_PAD_LEFT);
        $venda->save();

        foreach($this->parcelas as $key => $parcela){
            $nova_parcela = new VendaParcela;
            $nova_parcela->venda_id = $venda->id;
            $nova_parcela->numero = $key;
            $nova_parcela->valor = $parcela["valor"];
            $nova_parcela->vencimento = $parcela["vencimento"];
            $nova_parcela->save();
        }

        Util::limparLivewireTemp();

        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Venda gerada com sucesso!']);

        if(!$continuar){
            $this->dispatchBrowserEvent("fechaModalCadastroVenda");
        }else{
            $this->recomecarCadastro();
        }

        $this->emit('atualizaDatatableVendas');
    }

    public function recomecarCadastro(){
        $this->resetExcept();
        $this->venda = new Venda;
        $this->lotes_selecionados = collect();
        $this->parcelas = collect();
        $this->op = "listagem_clientes";
        $this->tarjar = 0;
    }

    public function resetaModalCadastroVenda(){
        $this->resetExcept();
    }
    
    public function render()
    {
        $parametros = [];

        if($this->op == "listagem_clientes"){
            $clientes = Cliente::where(null);
            if($this->filtro_clientes){
                $clientes = Cliente::where("nome_dono", "LIKE", "%" . $this->filtro_clientes . "%")->orWhere("email", "LIKE", "%" . $this->filtro_clientes . "%");
            }
            $clientes = $clientes->orderBy("nome_dono", "ASC")->paginate(10);
            return view('livewire.painel.vendas.modal-cadastro-venda', ["clientes" => $clientes]);
        }elseif($this->op == "informacoes_venda"){
            $lotes = Lote::where(null);
            if($this->filtro_lotes){
                $lotes = $lotes->where("numero", $this->filtro_lotes)->orWhere("nome", "LIKE", "%" . $this->filtro_lotes . "%");
            }
            $lotes = $lotes->whereNotIn("id", $this->lotes_selecionados->keys())->orderBy("created_at", "DESC")->limit(100)->get();
            return view('livewire.painel.vendas.modal-cadastro-venda', ['lotes' => $lotes]);
        }

        return view('livewire.painel.vendas.modal-cadastro-venda');
    }
}
