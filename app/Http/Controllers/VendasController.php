<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\Boleto;

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
        $boleto->save();
        toastr()->success("Boleto adicionado!");
        return redirect()->back();
    }

}
