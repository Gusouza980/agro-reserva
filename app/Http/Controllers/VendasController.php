<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\Boleto;
use App\Models\Nota;
use App\Models\Carrinho;
use App\Models\Lote;
use App\Models\CarrinhoProduto;

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

    public function venda_manual(Request $request){
        // dd($request->all());
        $venda = new Venda;
        $reservado = false;

        $carrinho = new Carrinho;
        $carrinho->cliente_id = $request->cliente;
        $carrinho->aberto = false;
        $carrinho->save();

        foreach($request->lotes as $lote_id){
            $lote = Lote::find($lote_id);
            $produto = new CarrinhoProduto;
            $produto->carrinho_id = $carrinho->id;
            $produto->lote_id = $lote->id;
            $produto->quantidade = 1;
            $produto->total = $lote->preco * $produto->quantidade;
            $produto->save();

            $carrinho->total += $produto->total;
            $carrinho->save();
        }

        $venda->cliente_id = $request->cliente;
        $venda->assessor_id = ($request->assessor != 0) ? $request->assessor : null ;
        $venda->parcelas = $request->parcelas;
        $parcelas = $request->parcelas;

        if($parcelas == 1){
            $comissao = 0;
            $desconto = 6;
        }else if($parcelas < 5){
            $comissao = 2;
            $desconto = 3;
        }else{
            $comissao = 4;
            $desconto = 0;
        }

        $valor_desconto = $carrinho->total * $desconto / 100;
        $valor_comissao = $carrinho->total * $comissao / 100;
        $total_compra = $carrinho->total - $valor_desconto + $valor_comissao;

        $venda->carrinho_id = $carrinho->id;
        $venda->total = $total_compra;
        $venda->desconto = $valor_desconto;
        $venda->comissao = $valor_comissao;
        $venda->valor_parcela = ($carrinho->total - $valor_desconto) / $parcelas;
        $venda->tipo = 1;
        $venda->save();

        $venda->codigo = str_pad($venda->id, 11, "0", STR_PAD_LEFT);

        $venda->save();

        toastr()->success("Venda concluida");
        return redirect()->back();
    }

}
