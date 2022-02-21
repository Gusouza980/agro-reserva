<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuracao;
use App\Classes\Util;
use Illuminate\Support\Facades\Log;

class LiveController extends Controller
{
    //

    public function index(){
        if(!Util::acesso("live", "consulta")){
            toastr()->error("Você não tem permissão para acessar essa página");
            return redirect()->back();
        }
        $configuracao = Configuracao::first();
        return view("painel.configuracoes.live", ["configuracao" => $configuracao]);
    }

    public function salvar(Request $request){
        $configuracao = Configuracao::first();
        $configuracao->live_ativo = $request->live_ativo;
        $configuracao->live_link = $request->live_link;
        $configuracao->save();
        return redirect()->back();
    }
}
