<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use App\Models\Raca;
use App\Models\Cliente;
use App\Models\Visita;
use App\Models\Venda;

class PainelController extends Controller
{
    //

    public function login(){
        if(session()->get("admin")){
            return redirect()->route("painel.index");
        }
        return view("painel.login");
    }
    
    public function logar(Request $request){
        if(session()->get("admin")){
            return redirect()->route("painel.index");
        }
        $usuario = Usuario::where("usuario", $request->usuario)->first();

        if($usuario && Hash::check($request->senha, $usuario->senha)){
            session()->put(["admin" => $usuario->toArray()]);
            return redirect()->route("painel.index");
        }else{
            toastr()->error("Dados de login incorretos. Tente novamente");
            return redirect()->back();
        }
    }

    public function sair(){
        if(session()->get("admin")){
            session()->forget("admin");
        }
        return redirect()->route("painel.login");
    }

    public function index(){
        // $racas = Raca::all();
        // $data =[];
        // foreach($racas as $raca){
        //     $data[$raca->nome] = $clientes = Cliente::where("racas", "LIKE", "%".$raca->nome."%")->count();
        // }
        return view("painel.index");
    }

    public function visitas(Request $request){
        if($request->isMethod('post')){
            $inicio = $request->inicio . " 00:00:00";
            $fim = $request->fim . " 23:59:59";
        }else{
            $inicio = date('Y-m-d', strtotime('-14 days')) . " 00:00:00";
            $fim = date('Y-m-d') . " 23:59:59";
        }
        $visitas = Visita::whereBetween("created_at", [$inicio, $fim])->orderBy("created_at", "ASC")->get();
        return view("painel.visitas.consultar", ["visitas" => $visitas, "inicio" => $inicio, "fim" => $fim]);
    }

}
