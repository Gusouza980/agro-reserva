<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\Boleto;
use App\Models\Nota;

class VendasController extends Controller
{
    //
    public function index(){
        $vendas = Venda::all();
        return view("painel.vendas.consultar", ["vendas" => $vendas]);
    }

    public function visualizar(Venda $venda){
        return view("painel.vendas.visualizar", ["venda" => $venda]);
    }

    public function adicionar_boleto(Request $request, Venda $venda){
        $boleto = new Boleto;
        $boleto->venda_id = $venda->id;
        if($request->file("caminho")){
            $boleto->caminho = $request->file('caminho')->store(
                'imagens/vendas/' . $venda->codigo . "/boletos", 'local'
            );
        }
        $boleto->descricao = $request->descricao;
        $boleto->validade = $request->validade;
        $boleto->status = 0;
        if(url()->current() == route('painel.fazenda.vendas.boleto.adicionar', ['venda' => $venda])){
            $boleto->admin = false;
            $boleto->fazendeiro_id = session()->get("fazendeiro")["id"];
        }else{
            $boleto->admin = true;
            $boleto->usuario_id = session()->get("admin")["id"];
        }
        $boleto->save();
        toastr()->success("Boleto adicionado!");
        return redirect()->back();
    }

    public function adicionar_nota(Request $request, Venda $venda){
        $nota = new Nota;
        $nota->venda_id = $venda->id;
        if($request->file("caminho")){
            $nota->caminho = $request->file('caminho')->store(
                'imagens/vendas/' . $venda->codigo . "/notas", 'local'
            );
        }
        $nota->descricao = $request->descricao;
        if(url()->current() == route('painel.fazenda.vendas.nota.adicionar', ['venda' => $venda])){
            $nota->admin = false;
            $nota->fazendeiro_id = session()->get("fazendeiro")["id"];
        }else{
            $nota->admin = true;
            $nota->usuario_id = session()->get("admin")["id"];
        }
        $nota->save();
        toastr()->success("Nota adicionada!");
        return redirect()->back();
    }

}
