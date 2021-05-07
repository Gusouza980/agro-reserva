<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lote;
use App\Models\Carrinho;
use App\Models\CarrinhoProduto;

class CarrinhoController extends Controller
{
    //

    public function carrinho(){
        $carrinho = Carrinho::find(session()->get("carrinho"));
        return view("carrinho", ["carrinho" => $carrinho]);
    }

    public function adicionar(Lote $lote){
        if(session()->get("carrinho")){
            $carrinho = Carrinho::find(session()->get("carrinho"));
        }else{
            $carrinho = new Carrinho;
            $carrinho->cliente_id = session()->get("cliente")["id"];
            $carrinho->aberto = true;
            $carrinho->save();
            session(["carrinho" => $carrinho->id]);
        }

        $produto = new CarrinhoProduto;
        $produto->carrinho_id = $carrinho->id;
        $produto->lote_id = $lote->id;
        $produto->quantidade = 1;
        $produto->total = $lote->preco * $produto->quantidade;
        $produto->save();

        $carrinho->total += $produto->total;
        $carrinho->save();

        toastr()->success("Produto adicionado ao carrinho !");
        return redirect()->back();
    }

    public function deletar(CarrinhoProduto $produto){
        $produto->delete();
        toastr()->success("Produto removido do carrinho.");
        return redirect()->back();
    }

    public function limpa(){
        include_once(app_path() . '/Apis/_functions.php');

        /* link especifico */
        $url = 'https://api.bscommerce.com.br/carrinho/';

        /* array de dados - insere item no carrinho */
        $data =  array(
            "token" => $tokenapi,
            "ope"   => "delCarrinho",
            "user"  => session()->get('userid'),
            "uuid"  => session()->get('useruuid')
        );

        /* envia dados e recebe retorno */
        $retorno = callAPI($url, $data);
        return redirect()->back();
    }

    public function concluir(){
        return view("concluir");
    }
}
