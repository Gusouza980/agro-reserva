<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fazendeiro;
use App\Models\Venda;
use App\Models\Visita;
use App\Models\Lote;
use App\Models\CurtidaLote;
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
        $fazenda = $fazendeiro->fazenda;

        $lotes = $fazenda->lotes;
        $visitas = Visita::whereIn("lote_id", $lotes)->get();
        $visitas = $visitas->groupBy("lote_id");

        $relacao_visitas = array();
        $total_visitas = 0;
        $mais_visitado = null;
        $maior_visitas = 0;

        foreach($visitas as $lote => $visita){
            $lote = Lote::find($lote);
            $relacao_visitas = [
                $lote->nome => $visita->count()
            ];

            $total_visitas += $visita->count();

            if($visita->count() > $maior_visitas){
                $mais_visitado = $lote->id;
                $maior_visitas = $visita->count();
            }
        }

        $mais_visitado = Lote::find($mais_visitado);

        $curtidas = CurtidaLote::whereIn("lote_id", $lotes)->get();
        $descurtidas = $curtidas->where("curtiu", false);
        $curtidas = $curtidas->where("curtiu", true);
        
        $curtidas = $curtidas->groupBy("lote_id");
        $mais_curtido = null;
        $maior_curtidas = 0;
        $relacao_curtidas = array();
        $total_curtidas = 0;

        foreach($curtidas as $lote => $curtida){
            $lote = Lote::find($lote);
            $relacao_curtidas = [
                $lote->nome => $curtida->count()
            ];

            $total_curtidas += $curtida->count();

            if($curtida->count() > $maior_curtidas){
                $mais_curtido = $lote->id;
                $maior_curtidas = $curtida->count();
            }
        }

        $mais_curtido = Lote::find($mais_curtido);

        $descurtidas = $descurtidas->groupBy("lote_id");
        $mais_descurtido = null;
        $maior_descurtidas = 0;
        $relacao_descurtidas = array();
        $total_descurtidas = 0;

        foreach($descurtidas as $lote => $descurtida){
            $lote = Lote::find($lote);
            $relacao_descurtidas = [
                $lote->nome => $descurtida->count()
            ];

            $total_descurtidas += $descurtida->count();

            if($descurtida->count() > $maior_descurtidas){
                $mais_descurtido = $lote->id;
                $maior_descurtidas = $descurtida->count();
            }
        }

        $mais_descurtido = Lote::find($mais_descurtido);

        return view("painel.fazendeiro.index", [
            "mais_visitado" => $mais_visitado,
            "maior_visitas" => $maior_visitas,
            "relacao_visitas" => $relacao_visitas,
            "total_visitas" => $total_visitas,
            "mais_curtido" => $mais_curtido,
            "maior_curtidas" => $maior_curtidas,
            "relacao_curtidas" => $relacao_curtidas,
            "total_curtidas" => $total_curtidas,
            "mais_descurtido" => $mais_descurtido,
            "maior_descurtidas" => $maior_descurtidas,
            "relacao_descurtidas" => $relacao_descurtidas,
            "total_descurtidas" => $total_descurtidas
        ]);
    }

    public function vendas(){
        $fazendeiro = Fazendeiro::find(session()->get("fazendeiro")["id"]);
        $vendas = $fazendeiro->fazenda->vendas;
        return view("painel.fazendeiro.vendas.consultar", ["vendas" => $vendas]);
    }

    public function visualizar_venda(Venda $venda){
        return view("painel.fazendeiro.vendas.visualizar", ["venda" => $venda]);
    }

}
