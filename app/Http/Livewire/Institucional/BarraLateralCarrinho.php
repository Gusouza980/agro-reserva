<?php

namespace App\Http\Livewire\Institucional;

use Livewire\Component;
use App\Models\Carrinho;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\CarrinhoProduto;

class BarraLateralCarrinho extends Component
{
    public $mostrarCarrinho = false;
    public $iniciar = false;
    public $num_produtos;

    protected $listeners = ["abreCarrinhoLateral", "adicionarProduto", "removerProduto"];

    public function abreCarrinhoLateral(){
        $this->mostrarCarrinho = !$this->mostrarCarrinho;
    }

    public function getClienteProperty(){
        return Cliente::find(session()->get("cliente")["id"]);
    }

    public function getCarrinhosProperty(){
       return Carrinho::with("produtos")->with("produtos.produtable")->with("produtos.produtable.reserva")->with("produtos.produtable.fazenda")->where([["cliente_id", session()->get("cliente")["id"]], ["aberto", true]])->get();
    }

    public function adicionarProduto(Produto $produto){
        
        if($produto->produtable->reserva->encerrada){
            $msg = "A reserva " . $produto->produtable->reserva->fazenda->nome_fazenda . " já foi encerrada !";
            $this->emit("mostrarPopup", "erro", $msg);
            return;
        }

        if($this->cliente->aprovado != 1){
            $msg = "Para comprar na Agroreserva seu cadastro precisa estar <b>finalizado</b> e <b>aprovado</b>. Bora que ainda da tempo ! Entre em contato com nosso comercial para regularizar seu cadastro.";
            $this->emit("mostrarPopup", "erro", $msg);
            return;
        }

        if($produto->produtable->reservado){
            $msg = "Este lote já foi vendido, mas não fique triste ! Temos muito mais pra te oferecer !";
            $this->emit("mostrarPopup", "erro", $msg);
            return;
        }

        if(!$this->carrinhos || $this->carrinhos->where("reserva_id", $produto->produtable->reserva_id)->count() == 0){
            $carrinho = new Carrinho;
            $carrinho->cliente_id = session()->get("cliente")["id"];
            $carrinho->reserva_id = $produto->produtable->reserva_id;
            $carrinho->save();
            session()->put(["carrinho" => true]);
        }else{
            $carrinho = $this->carrinhos->where("reserva_id", $produto->produtable->reserva_id)->first();
        }

        if($carrinho->produtos->where("id", $produto->id)->count() > 0){
            $msg = "Este lote já está em seu carrinho. Bora procurar outro ?";
            $this->emit("mostrarPopup", "erro", $msg);
            return;
        }

        if($produto->produtable->membro_pacote){
            $membros = Lote::where("reserva_id", $produto->produtable->reserva_id)->where("id", "<>", $produto->produtable->id)->where("numero", $produto->produtable->numero)->get();
        }

        $carrinho_produto = new CarrinhoProduto;
        $carrinho_produto->carrinho_id = $carrinho->id;
        $carrinho_produto->produto_id = $produto->id;
        $carrinho_produto->quantidade = 1;
        $carrinho_produto->total = $produto->preco * $carrinho_produto->quantidade;
        $carrinho_produto->save();

        if(isset($membros)){
            foreach($membros as $membro){
                $carrinho_produto = new CarrinhoProduto;
                $carrinho_produto->carrinho_id = $carrinho->id;
                $carrinho_produto->produto_id = $membro->produto->id;
                $carrinho_produto->quantidade = 1;
                $carrinho_produto->total = $membro->produto->preco * $carrinho_produto->quantidade;
                $carrinho_produto->save();
            }
        }

        $msg = "O lote foi adicionado ao seu caminhão! Você pode ver todos os detalhes clicando no ícone de caminhão no topo direito da sua tela.";
        $this->emit("mostrarPopup", "sucesso", $msg);

        $this->carrinhos = Carrinho::where([["cliente_id", session()->get("cliente")["id"]], ["aberto", true]])->get();
        $this->atualizaContagemLotes();
    }

    public function removerProduto(Carrinho $carrinho, Produto $produto){
        $carrinho_produto = $carrinho->carrinho_produtos->where("produto_id", $produto->id)->first();
        $carrinho_produto->delete();
        $carrinho->refresh();
        if($carrinho->produtos->count() == 0){
            foreach($this->carrinhos as $key => $value){
                if($value->id == $carrinho->id){
                    unset($this->carrinhos[$key]);
                }
            }
            $carrinho->delete();
            if($this->carrinhos->count() == 0){
                session()->forget("carrinho");
            }
        }else{
            $this->carrinhos = Carrinho::where([["cliente_id", session()->get("cliente")["id"]], ["aberto", true]])->get();
        }
        $this->atualizaContagemLotes();
    }

    public function atualizaContagemLotes(){
        if($this->carrinhos && $this->carrinhos->count() > 0){
            $lotes = 0;
            foreach($this->carrinhos as $carrinho){
                $lotes += $carrinho->produtos->count();
            }
            $this->dispatchBrowserEvent("atualizaContagemLotes", $lotes);
        }
    }

    public function init(){
        $this->atualizaContagemLotes();
    }

    public function render()
    {
        return view('livewire.institucional.barra-lateral-carrinho');
    }
}
