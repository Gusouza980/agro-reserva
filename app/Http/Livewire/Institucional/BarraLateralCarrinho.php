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
    public $cliente;
    public $carrinhos;

    protected $listeners = ["abreCarrinhoLateral", "adicionarProduto", "atualizaContagemLotes"];

    public function abreCarrinhoLateral(){
        $this->mostrarCarrinho = !$this->mostrarCarrinho;
    }

    public function adicionarProduto(Produto $produto){
        
        if(!$this->cliente->aprovado){
            $msg = "Para comprar na Agroreserva seu cadastro precisa estar <b>finalizado</b> e <b>aprovado</b>. Bora que ainda da tempo ! Entre em contato com nosso comercial para regularizar seu cadastro.";
            $this->emit("mostrarPopup", "erro", $msg);
            return;
        }

        if($this->carrinhos->where("reserva_id", $produto->produtable->reserva_id)->count() == 0){
            $carrinho = new Carrinho;
            $carrinho->cliente_id = session()->get("cliente")["id"];
            $carrinho->reserva_id = $produto->produtable->reserva_id;
            $carrinho->save();
            $this->carrinhos->push($carrinho);
            session()->put(["carrinho" => true]);
        }else{
            $carrinho = $this->carrinhos->where("reserva_id", $produto->produtable->reserva_id)->first();
        }

        if($carrinho->produtos->where("id", $produto->id)->count() > 0){
            $msg = "Este lote já está em seu carrinho. Bora procurar outro ?";
            $this->emit("mostrarPopup", "erro", $msg);
            return;
        }

        $carrinho_produto = new CarrinhoProduto;
        $carrinho_produto->carrinho_id = $carrinho->id;
        $carrinho_produto->produto_id = $produto->id;
        $carrinho_produto->quantidade = 1;
        $carrinho_produto->total = $produto->preco * $carrinho_produto->quantidade;
        $carrinho_produto->save();

        $msg = "O lote foi adicionado ao seu caminhão! Você pode ver todos os detalhes clicando no ícone de caminhão no topo direito da sua tela.";
        $this->emit("mostrarPopup", "sucesso", $msg);

        $this->carrinhos->where("id", $carrinho->id)->first()->refresh();
        $this->atualizaContagemLotes();
    }

    public function removerProduto(Carrinho $carrinho, Produto $produto){
        $carrinho_produto = $carrinho->carrinho_produtos->where("produto_id", $produto->id)->first();
        $carrinho_produto->delete();
        $this->carrinhos->where("id", $carrinho->id)->first()->refresh();
        $this->atualizaContagemLotes();
    }

    public function atualizaContagemLotes(){
        $lotes = 0;
        foreach($this->carrinhos as $carrinho){
            $lotes += $carrinho->produtos->count();
        }
        $this->emit("atualizaNumeroProdutos", $lotes);
    }

    public function mount(){
        $this->cliente = Cliente::find(session()->get("cliente")["id"]);
        $this->carrinhos = Carrinho::where([["cliente_id", session()->get("cliente")["id"]], ["aberto", true]])->get();
        
        $lotes = 0;
        foreach($this->carrinhos as $carrinho){
            $lotes += $carrinho->produtos->count();
        }
        $this->emit("atualizaNumeroProdutos", $lotes);
    }

    public function render()
    {
        return view('livewire.institucional.barra-lateral-carrinho');
    }
}
