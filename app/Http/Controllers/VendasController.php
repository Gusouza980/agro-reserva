<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\Boleto;
use App\Models\Nota;
use App\Models\Carrinho;
use App\Models\Lote;
use App\Models\CarrinhoProduto;
use App\Models\Cliente;
use App\Classes\Email;
use Illuminate\Support\Str;
use PDF;


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

        $cliente = Cliente::find($request->cliente);

        $carrinho = new Carrinho;
        $carrinho->cliente_id = $cliente->id;
        $carrinho->aberto = false;
        $carrinho->save();

        foreach($request->lotes as $lote_id){
            $lote = Lote::find($lote_id);
            if($lote->reservado){
                toastr()->error("Um ou mais lotes escolhidos já foram reservados.");
                return redirect()->back();
            }
            $lote->reservado = true;
            $lote->save();
            $produto = new CarrinhoProduto;
            $produto->carrinho_id = $carrinho->id;
            $produto->lote_id = $lote->id;
            $produto->quantidade = 1;
            $produto->total = $lote->preco * $produto->quantidade;
            $produto->save();

            $carrinho->total += $produto->total;
            $carrinho->save();
        }

        $venda->cliente_id = $cliente->id;
        $venda->assessor_id = ($request->assessor != 0) ? $request->assessor : null ;
        $venda->parcelas = $request->parcelas;
        
        $parcelas = $request->parcelas;
        $desconto = $request->desconto;
        $comissao = 0;

        $valor_desconto = $carrinho->total * $desconto / 100;
        $valor_comissao = $carrinho->total * $comissao / 100;
        $total_compra = $carrinho->total - $valor_desconto + $valor_comissao;

        $venda->carrinho_id = $carrinho->id;
        $venda->total = $total_compra;
        $venda->desconto = $valor_desconto;
        $venda->comissao = $valor_comissao;
        $venda->porcentagem_comissao = $comissao;
        $venda->porcentagem_desconto = $desconto;
        $venda->porcentagem_venda = 100;

        if($request->parcelas_mes > 1){
            $venda->dias_entre_parcelas = 15;
        }else{
            $venda->dias_entre_parcelas = 30;
        }
        
        $venda->parcelas_mes = $request->parcelas_mes;
        $venda->valor_parcela = ($carrinho->total - $valor_desconto) / $parcelas;
        $venda->primeira_parcela = $request->primeira_parcela;
        $venda->tipo = 1;
        $venda->save();

        $venda->codigo = str_pad($venda->id, 11, "0", STR_PAD_LEFT);

        $venda->save();

        $data = ["venda" => $venda];
        $pdf = PDF::loadView('cliente.comprovante2', $data);
        $pdf->save(public_path() . "/comprovantes/".$venda->id.".pdf");
        $file = file_get_contents('templates/emails/confirmar-compra.html');
        Email::enviar($file, "Confirmação de Compra", $cliente->email, false, public_path() . "/comprovantes/" . $venda->id . ".pdf");

        toastr()->success("Venda concluida");
        return redirect()->back();
    }

}
