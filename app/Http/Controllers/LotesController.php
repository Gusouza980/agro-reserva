<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fazenda;
use App\Models\Lote;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Reserva;
use App\Models\Chave;

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
        $fazenda = $reserva->fazenda;
        $lote->nome = $request->nome;
        $lote->registro = $request->registro;
        $lote->peso = $request->peso;
        $lote->rgn = $request->rgn;
        $lote->iabczg = $request->iabczg;
        $lote->ce = $request->ce;
        $lote->deca = $request->deca;
        $lote->botton = $request->botton;
        $lote->lact_atual = $request->lact_atual;
        $lote->gpta = $request->gpta;
        $lote->ccg = $request->ccg;
        $lote->parto = $request->parto;
        $lote->numero = $request->numero;
        $lote->sexo = $request->sexo;
        $lote->letra = $request->letra;
        $lote->nascimento = $request->nascimento;
        $lote->observacoes = $request->observacoes;
        $lote->raca_id = $request->raca;
        $lote->preco = $request->preco;
        $lote->parcelas = $request->parcelas;
        if($request->pacote == 1){
            $lote->pacote = true;
        }elseif($request->pacote == 2){
            $lote->membro_pacote = true;
            $lote->pacote_id = $request->lote_pacote;
        }
        if($reserva->multi_fazendas){
            $lote->fazenda_id = $request->fazenda;
        }else{
            $lote->fazenda_id = $reserva->fazenda_id;
        }
        $lote->reserva_id = $reserva->id;
        $lote->video = $request->video;
        $lote->ativo = $request->ativo;

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

        if($request->file("catalogo")){
            $lote->catalogo = $request->file('catalogo')->store(
                'imagens/fazendas/' . Str::slug($lote->fazenda->nome_fazenda) . "/lotes", 'local'
            );
        }

        foreach($request->chaves as $chave){
            if(is_numeric($chave)){
                $lote->chaves()->attach($chave);
            }else{
                $nova_chave = new Chave;
                $nova_chave->palavra = $chave;
                $nova_chave->save();
                $lote->chaves()->attach($nova_chave);
            }
        }    

        $lote->save();
        toastr()->success("Lote salvo com sucesso!");
        return redirect()->route("painel.fazenda.reserva.lotes", ["reserva" => $reserva]);
    }

    public function editar(Lote $lote){
        return view("painel.lotes.editar", ["lote" => $lote]);
    }

    public function salvar(Request $request, Lote $lote){
        $lote->nome = $request->nome;
        $lote->registro = $request->registro;
        $lote->peso = $request->peso;
        $lote->rgn = $request->rgn;
        $lote->iabczg = $request->iabczg;
        $lote->ce = $request->ce;
        $lote->deca = $request->deca;
        $lote->botton = $request->botton;
        $lote->lact_atual = $request->lact_atual;
        $lote->gpta = $request->gpta;
        $lote->ccg = $request->ccg;
        $lote->parto = $request->parto;
        $lote->numero = $request->numero;
        $lote->sexo = $request->sexo;
        $lote->letra = $request->letra;
        $lote->nascimento = $request->nascimento;
        $lote->observacoes = $request->observacoes;
        $lote->raca_id = $request->raca;
        $lote->preco = $request->preco;
        $lote->parcelas = $request->parcelas;
        $lote->video = $request->video;
        $lote->ativo = $request->ativo;

        if($request->pacote == 0){
            $lote->pacote = false;
            $lote->membro_pacote = false;
            $lote->pacote_id = null;
        }elseif($request->pacote == 1){
            $lote->pacote = true;
            $lote->membro_pacote = false;
            $lote->pacote_id = null;
        }else{
            $lote->pacote = false;
            $lote->membro_pacote = true;
            $lote->pacote_id = $request->lote_pacote;
        }

        if($lote->reserva->multi_fazendas){
            $lote->fazenda_id = $request->fazenda;
        }

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

        if($request->file("catalogo")){
            Storage::delete($lote->catalogo);
            $lote->catalogo = $request->file('catalogo')->store(
                'imagens/fazendas/' . Str::slug($lote->fazenda->nome_fazenda) . "/lotes", 'local'
            );
        }

        $lote->chaves()->detach();

        foreach($request->chaves as $chave){
            if(is_numeric($chave)){
                $lote->chaves()->attach($chave);
            }else{
                $nova_chave = new Chave;
                $nova_chave->palavra = $chave;
                $nova_chave->save();
                $lote->chaves()->attach($nova_chave);
            }
        }   

        $lote->save();

        return redirect()->route("painel.fazenda.reserva.lotes", ["reserva" => $lote->reserva]);
    }

    public function reservar(Lote $lote){
        if($lote->reservado){
            $lote->reservado = false;
            $lote->save();
            return response()->json(false);
        }else{
            $lote->reservado = true;
            $lote->save();
            return response()->json(true);
        }
    }

    public function ativo(Lote $lote){
        if($lote->ativo){
            $lote->ativo = false;
            $lote->save();
            return response()->json(false);
        }else{
            $lote->ativo = true;
            $lote->save();
            return response()->json(true);
        }
    }

    public function preco(Lote $lote){
        if($lote->liberar_preco){
            $lote->liberar_preco = false;
            toastr()->success("Usando padrão de preço");
        }else{
            $lote->liberar_preco = true;
            toastr()->success("Preço liberado");
        }
        $lote->save();
        return redirect()->back();
    }

    public function comprar(Lote $lote){
        if($lote->liberar_compra){
            $lote->liberar_compra = false;
            toastr()->success("Usando padrão de compra");
        }else{
            $lote->liberar_compra = true;
            toastr()->success("Compra liberada");
        }
        $lote->save();
        return redirect()->back();
    }

    public function prioridade(Lote $lote){
        if($lote->prioridade){
            $lote->prioridade = false;
            $lote->save();
            return response()->json(false);
        }else{
            $lote->prioridade = true;
            $lote->save();
            return response()->json(true);
        }
    }
}
