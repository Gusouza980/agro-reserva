<?php

namespace App\Http\Livewire\Painel\Vendas;

use Livewire\Component;
use App\Models\Venda;
use App\Classes\FuncoesVenda;
use App\Models\Lote;
use App\Models\CarrinhoProduto;

class Detalhes extends Component
{

    public $venda;

    protected $listeners = ["atualizaValor", "adicionaLoteVenda"];

    public function atualizaValor(Venda $venda, $campo, $valor){
        $venda->$campo = $valor;
        $venda->save();
        FuncoesVenda::atualizaValores($venda);
        $this->venda->refresh();
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Dado atualizado com sucesso!']);
    }

    public function adicionaLoteVenda(Lote $lote){
        $carrinho_produto = new CarrinhoProduto;
        $carrinho_produto->carrinho_id = $this->venda->carrinho->id;
        $carrinho_produto->lote_id = $lote->id;
        $carrinho_produto->produto_id = $lote->produto->id;
        $carrinho_produto->quantidade = 1;
        $carrinho_produto->total = $lote->produto->preco * $carrinho_produto->quantidade;
        $carrinho_produto->save();
        $this->venda->refresh();
        FuncoesVenda::atualizaValores($this->venda);
        $this->emit("atualizaDatatableParcelas");
    }

    public function removerProduto($produto_id){
        if($this->venda->carrinho->produtos->count() == 1){
            $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'error', 'mensagem' => 'Não é possível remover este produto, pois é o único na venda!']);
            return;
        }
        $carrinho = $this->venda->carrinho;
        $carrinho->carrinho_produtos->where("produto_id", $produto_id)->first()->delete();
        $this->venda->refresh();
        FuncoesVenda::atualizaValores($this->venda);
        $this->emit("atualizaDatatableParcelas");
        $this->dispatchBrowserEvent('notificaToastr', ['tipo' => 'success', 'mensagem' => 'Produto removido com sucesso!']);
    }

    public function mount(Venda $venda){
        $this->venda = $venda;
    }

    public function render()
    {
        return view('livewire.painel.vendas.detalhes');
    }
}
