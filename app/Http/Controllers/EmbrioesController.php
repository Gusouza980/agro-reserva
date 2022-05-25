<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fazenda;
use App\Models\Embriao;
use App\Models\Reserva;
use App\Classes\Util;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EmbrioesController extends Controller
{
    //
    public function index(Reserva $reserva){
        if(!Util::acesso("reservas", "consulta")){
            toastr()->error("Você não tem permissão para acessar essa página");
            return redirect()->back();
        }
        return view("painel.embrioes.consultar", ["reserva" => $reserva]);
    }

    public function cadastro(Reserva $reserva){
        if(!Util::acesso("fazendas", "cadastro")){
            toastr()->error("Você não tem permissão para acessar essa página");
            return redirect()->back();
        }
        return view("painel.embrioes.cadastro", ["reserva" => $reserva]);
    }

    public function editar(Embriao $embriao){
        if(!Util::acesso("fazendas", "cadastro")){
            toastr()->error("Você não tem permissão para acessar essa página");
            return redirect()->back();
        }
        return view("painel.embrioes.editar", ["embriao" => $embriao]);
    }

    public function salvar(Reserva $reserva, Request $request){
        if($request->embriao_id){
            $embriao = Embriao::find($request->embriao_id);
        }else{
            $embriao = new Embriao;
        }

        $embriao->reserva_id = $reserva->id;
        $embriao->fazenda_id = $request->fazenda_id;
        $embriao->categoria = $request->categoria;
        $embriao->tipo = $request->tipo;
        $embriao->nome_pai = $request->nome_pai;
        $embriao->nome_mae = $request->nome_mae;
        $embriao->info_lactacao_mae = $request->info_lactacao_mae;
        $embriao->grau_sangue = $request->grau_sangue;
        $embriao->prefixo_numero = $request->prefixo_numero;
        $embriao->sufixo_numero = $request->sufixo_numero;
        $embriao->numero = $request->numero;

        if($request->file("catalogo")){
            Storage::delete($embriao->catalogo);
            $embriao->catalogo = $request->file('catalogo')->store(
                'imagens/fazendas/' . Str::slug($reserva->fazenda->nome_fazenda) . "/embrioes", 'local'
            );
        }

        $embriao->save();

        return redirect()->route("painel.fazenda.reserva.embrioes", ["reserva" => $reserva]);
    }
}
