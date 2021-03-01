<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    //

    public function carrinho(){
        include_once(app_path() . '/Apis/_functions.php');

        /* link especifico */
        $url = 'https://api.bscommerce.com.br/carrinho/';

        /* array de dados - lista carrinho completo */
        $data =  array(
            "token" => $tokenapi,
            "ope"   => "getCarrinho",
            "user"  => session()->get("userid"),
            "uuid"  => session()->get("useruuid")
        );

        /* envia dados e recebe retorno */
        $retorno = callAPI($url, $data);

        /* retorno em html, devolve tabela do carrinho completa */


        if ($retorno != 'false') {
            // echo $retorno;
        }

        return view("carrinho", ["tabela" => $retorno]);
    }

    public function adicionar($produto){
        include_once(app_path() . '/Apis/_functions.php');

        $qtde = 1;

        /* link especifico */
        $url = 'https://api.bscommerce.com.br/carrinho/';

        /* array de dados - insere item no carrinho */
        $data =  array(
            "token" => $tokenapi,
            "ope"   => "setCarrinhoItem",
            "user"  => session()->get("userid"),
            "uuid"  => session()->get("useruuid"),
            "code"  => $produto,
            "qtde"  => $qtde
        );

        /* envia dados e recebe retorno */
        $retorno = callAPI($url, $data);
        if ($retorno == 'false') {
            // echo "Deu ruim";
            toastr()->error("Erro ao adicionar o produto no carrinho, tente novamente mais tarde");
            return redirect()->back();
        } else {
            toastr()->success("Produto adicionado !");
            return redirect()->route("carrinho");
            // 
            // echo '<script>document.location.href=\'carrinho.php\';</script>';
        }
        // return redirect()->back();
    }

    public function deletar($produto){
        include_once(app_path() . '/Apis/_functions.php');

        /* link especifico */
        $url = 'https://api.bscommerce.com.br/carrinho/';

        /* array de dados - insere item no carrinho */
        $data =  array(
            "token" => $tokenapi,
            "ope"   => "delCarrinhoItem",
            "cartid"  => $produto
        );

        $retorno = callAPI($url, $data);

        return redirect()->back();

        // return redirect()->back();
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
