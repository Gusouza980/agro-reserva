<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fazenda;

class SiteController extends Controller
{

    public function index(){
        include_once(app_path() . '\Apis\_functions.php');


        $setorpai = (isset($_GET['setor'])) ? $_GET['setor'] : "1"; //get ou post

        /* link especifico */
        $url = 'https://api.bscommerce.com.br/setor/';

        /* array de dados */
        $data =  array(
            "token" => $tokenapi,
            "ope"   => "getSetores",
            "pai"  	=> $setorpai
        );

        /* envia dados e recebe retorno */
        $retorno = callAPI($url, $data);

        /* converte json em array (opcional) */
        $fazendas = json_decode($retorno);
        return view("index", ["fazendas" => $fazendas]);

    }

    public function conheca($slug){

        include_once(app_path() . '\Apis\_functions.php');

        /* link especifico */
        $url = 'https://api.bscommerce.com.br/setor/';
        
        /* array de dados */
        $data =  array(
            "token" => $tokenapi,
            "ope"   => "getSetor",
            "slug"  	=> $slug
        );
        
        /* envia dados e recebe retorno */
        $retorno = callAPI($url, $data);
        
        /* converte json em array (opcional) */
        $fazenda = json_decode($retorno);

        $fazenda_bd = Fazenda::where("slug", $slug)->first();

        return view("fazenda", ["fazenda" => $fazenda[0], "slug" => $slug, "fazenda_bd" => $fazenda_bd]);

    }

    public function lotes($slug){

        include_once(app_path() . '\Apis\_functions.php');

        $page = "1"; //get ou post
        $rows = "-1"; //get ou post

        /* link especifico */
        $url = 'https://api.bscommerce.com.br/produto/';

        /* array de dados */
        $data =  array(
            "token" => $tokenapi,
            "ope"   => "getProdutos",
            "page"  => $page,
            "rows"  => $rows,
            "slug"  => $slug
        );

        /* envia dados e recebe retorno */
        $retorno = callAPI($url, $data);

        /* converte json em array (opcional) */
        $produtos = json_decode($retorno);

        /* link especifico */
        $url = 'https://api.bscommerce.com.br/setor/';
        
        /* array de dados */
        $data =  array(
            "token" => $tokenapi,
            "ope"   => "getSetor",
            "slug"  	=> $slug
        );
        
        /* envia dados e recebe retorno */
        $retorno = callAPI($url, $data);
        
        /* converte json em array (opcional) */
        $fazenda = json_decode($retorno);



        return view("lotes", ["fazenda" => $fazenda[0], "slug" => $slug, "produtos" => $produtos]);

    }

    public function lote($slug, $lote){
        include_once(app_path() . '\Apis\_functions.php');
        /* link especifico */
        $url = 'https://api.bscommerce.com.br/produto/';

        /* array de dados */
        $data =  array(
            "token" => $tokenapi,
            "ope"   => "getProduto",
            "code"  => $lote
        );

        /* envia dados e recebe retorno */
        $retorno = callAPI($url, $data);

        /* converte json em array (opcional) */
        $produto = json_decode($retorno);

        /* link especifico */
        $url = 'https://api.bscommerce.com.br/setor/';
        
        /* array de dados */
        $data =  array(
            "token" => $tokenapi,
            "ope"   => "getSetor",
            "slug"  	=> $slug
        );
        
        /* envia dados e recebe retorno */
        $retorno = callAPI($url, $data);
        
        /* converte json em array (opcional) */
        $fazenda = json_decode($retorno);
        return view("lote", ["produto" => $produto, "fazenda" => $fazenda]);
    }

    public function cadastro_fazenda(){
        return view("cadastro.fazenda");
    }

    public function cadastro_passos(){

        if(!session()->get("cliente")){
            return redirect()->route("cadastro");
        }

        include_once(app_path() . '\Apis\_functions.php');

        /* link especifico */
        $url = 'https://api.bscommerce.com.br/cadastro/';

        /* array de dados - lista carrinho completo */
        $data =  array(
            "token" => $tokenapi,
            "ope"   => "getEstados",
            "uf" => ''
        );

        /* envia dados e recebe retorno */
        $retorno = callAPI($url, $data);

        /* converte json em array (opcional) */
        $dados = json_decode($retorno);
        
        $estados = $dados;

        $data =  array(
            "token" => $tokenapi,
            "ope"   => "getCidades",
            "cidade" => 0,
            "uf" => $estados[0]->sg_Uf
        );

        /* envia dados e recebe retorno */
        $retorno = callAPI($url, $data);
        
        /* converte json em array (opcional) */
        $dados = json_decode($retorno);

        $cidades = $dados;      

        return view('cadastro.passos', 
            [
                "estados" => $estados,
                "cidades" => $cidades
            ]
        );
    }

    public function logar(Request $request){
        include_once(app_path() . '\Apis\_functions.php');


        /* link especifico */
        $url = 'https://api.bscommerce.com.br/login/';

        /* array de dados - lista carrinho completo */
        $data =  array(
            "token" => $tokenapi,
            "ope"   => "getLogin",
            "email" => $request->email,
            "senha" => $request->senha
        );

        /* envia dados e recebe retorno */
        $retorno = callAPI($url, $data);

        /* converte json em array (opcional) */
        $dados = json_decode($retorno);
        if($dados[0]->ID_Cliente > 0){
            session()->put(['userid' => $dados[0]->ID_Cliente]);
            return redirect()->route('index');
        }else{
            toastr()->error("Os dados informados não correspondem a uma conta.");
            return redirect()->back();
        }
    }
}
