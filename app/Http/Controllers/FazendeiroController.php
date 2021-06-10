<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fazendeiro;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class FazendeiroController extends Controller
{
    //
    public function login(){
        if(session()->get("fazendeiro")){
            return redirect()->route("painel.fazenda.index");
        }
        return view("painel.fazendeiro.login");;
    }
    
    public function logar(Request $request){
        if(session()->get("fazendeiro")){
            return redirect()->route("painel.fazenda.index");
        }
        $usuario = Fazendeiro::where("usuario", $request->usuario)->first();
        if($usuario && Hash::check($request->senha, $usuario->senha)){
            session()->put(["fazendeiro" => $usuario->toArray()]);
            return redirect()->route("painel.fazenda.index");
        }else{
            toastr()->error("Dados de login incorretos. Tente novamente");
            return redirect()->back();
        }
    }

    public function sair(){
        if(session()->get("fazendeiro")){
            session()->forget("fazendeiro");
        }
        return redirect()->route("painel.fazenda.login");
    }

    public function index(){
        $fazendeiro = Fazendeiro::find(session()->get("fazendeiro")["id"]);
        
        foreach($lotes as $lote){
            $carrinhos = $lote->carrinhos->where("aberto", false)->unique();
        }
        
        return view("painel.fazendeiro.index");
    }

    public function vendas(){
        
    }
}
