<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fazenda;
use App\Models\Lote;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Reserva;

class LotesController extends Controller
{
    //
    public function index(Reserva $reserva){
        return view("painel.lotes.consultar", ["reserva" => $reserva]);
    }

    public function cadastro(Reserva $reserva){
        return view("painel.lotes.cadastro", ["reserva" => $reserva]);
    }

    public function cadastrar(Request $request, Reserva $reserva){
        $lote = new Lote;

        $lote->nome = $request->nome;
        $lote->registro = $request->registro;
        $lote->nascimento = $request->nascimento;
        $lote->observacoes = $request->observacoes;
        $lote->raca_id = $request->raca;
        $lote->preco = $request->preco;
        $lote->parcelas = $request->parcelas;
        $lote->fazenda_id = $reserva->fazenda_id;
        $lote->reserva_id = $reserva->reserva_id;
        $lote->video = $request->video;

        if($request->file("preview")){
            $lote->preview = $request->file('preview')->store(
                'imagens/fazendas/' . Str::slug($fazenda->nome_fazenda) . "/lotes", 'local'
            );
        }

        if($request->file("genealogia")){
            $lote->genealogia = $request->file('genealogia')->store(
                'imagens/fazendas/' . Str::slug($fazenda->nome_fazenda) . "/lotes", 'local'
            );
        }

        $lote->save();
        toastr()->success("Lote salvo com sucesso!");
        return redirect()->route("painel.fazenda.lotes", ["fazenda" => $fazenda]);
    }

    public function editar(Lote $lote){
        return view("painel.lotes.editar", ["lote" => $lote]);
    }

    public function salvar(Request $request, Lote $lote){
        $lote->nome = $request->nome;
        $lote->registro = $request->registro;
        $lote->nascimento = $request->nascimento;
        $lote->observacoes = $request->observacoes;
        $lote->raca_id = $request->raca;
        $lote->preco = $request->preco;
        $lote->parcelas = $request->parcelas;
        $lote->video = $request->video;

        if($request->file("preview")){
            Storage::delete($lote->preview);
            $lote->preview = $request->file('preview')->store(
                'imagens/fazendas/' . Str::slug($lote->fazenda->nome_fazenda) . "/lotes", 'local'
            );
        }

        if($request->file("genealogia")){
            Storage::delete($lote->genealogia);
            $lote->genealogia = $request->file('genealogia')->store(
                'imagens/fazendas/' . Str::slug($lote->fazenda->nome_fazenda) . "/lotes", 'local'
            );
        }

        $lote->save();

        return redirect()->route("painel.fazenda.reserva.lotes", ["reserva" => $lote->reserva]);
    }
}
