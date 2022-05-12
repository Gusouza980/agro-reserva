<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use App\Models\Raca;
use App\Models\Cliente;
use App\Models\Visita;
use App\Models\Venda;
use Analytics;
use Spatie\Analytics\Period;
use Illuminate\Support\Facades\Log;

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
            if(!$usuario->ativo){
                Log::channel('acessos_painel')->warning('LOGIN: O usuário bloqueado <b>' . $usuario->nome . '</b> realizou uma tentativa de login no sistema.');
                toastr()->error("Seu acesso está bloqueado. Contate um dos administradores do sistema");
                return redirect()->back();
            }
            Log::channel('acessos_painel')->warning('LOGIN: O usuário <b>' . $usuario->nome . '</b> entrou no sistema.');
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
        
        $reservas = \App\Models\Reserva::where("ativo", true)->get();

        return view("painel.index", ['reservas' => $reservas]);
    }

    public function visitas(Request $request){
        if($request->isMethod('post')){
            $inicio = $request->inicio;
            $fim = $request->fim;
            $inicio_time = $request->inicio . " 00:00:00";
            $fim_time = $request->fim . " 23:59:59";
            if($request->reserva != -1){
                $visitas = Visita::whereBetween("created_at", [$inicio_time, $fim_time])->whereHas("lote", function($q) use ($request){
                    $q->where("reserva_id", $request->reserva);
                })->orderBy("created_at", "ASC")->get();
                return view("painel.visitas.consultar", ["visitas" => $visitas, "inicio" => $inicio, "fim" => $fim, "filtro_reserva" => $request->reserva]);
            }
        }else{
            $inicio = date('Y-m-d', strtotime('-14 days'));
            $fim = date('Y-m-d');
            $inicio_time = date('Y-m-d', strtotime('-14 days')) . " 00:00:00";
            $fim_time = date('Y-m-d') . " 23:59:59";
        }
        $visitas = Visita::whereBetween("created_at", [$inicio_time, $fim_time])->orderBy("created_at", "ASC")->get();
        return view("painel.visitas.consultar", ["visitas" => $visitas, "inicio" => $inicio, "fim" => $fim]);
    }

}
