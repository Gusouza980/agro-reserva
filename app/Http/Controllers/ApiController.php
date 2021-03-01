<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    //

    public function getCidadesByUf($uf){
        include_once(app_path() . '/Apis/_functions.php');

        /* link especifico */
        $url = 'https://api.bscommerce.com.br/cadastro/';

        $data =  array(
            "token" => $tokenapi,
            "ope"   => "getCidades",
            "cidade" => 0,
            "uf" => $uf
        );

        /* envia dados e recebe retorno */
        $retorno = callAPI($url, $data);
        
        return response()->json($retorno);   
    }
}
