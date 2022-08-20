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
use App\Classes\Util;
use Illuminate\Support\Facades\Log;
use App\Models\VendaParcela;
use App\Classes\FuncoesVenda;

class VendasController extends Controller
{
    //
    public function index(Request $request){
        if(!Util::acesso("vendas", "consulta")){
            toastr()->error("Você não tem permissão para acessar essa página");
            return redirect()->back();
        }
        if($request->isMethod('post')){
            $inicio = $request->inicio;
            $fim = $request->fim;
            $inicio_time = $request->inicio . " 00:00:00";
            $fim_time = $request->fim . " 23:59:59";
            if($request->reserva != -1){
                $vendas = Venda::whereBetween("created_at", [$inicio_time, $fim_time])->whereHas("carrinho", function($q) use ($request){
                    $q->whereHas("lotes", function($w) use ($request){
                        $w->where("reserva_id", $request->reserva);
                    });
                })->orderBy("created_at", "ASC")->get();
                return view("painel.vendas.consultar", ["vendas" => $vendas, "inicio" => $inicio, "fim" => $fim, "filtro_reserva" => $request->reserva]);
            }
        }else{
            $inicio = date('Y-m-d', strtotime('-14 days'));
            $fim = date('Y-m-d');
            $inicio_time = date('Y-m-d', strtotime('-14 days')) . " 00:00:00";
            $fim_time = date('Y-m-d') . " 23:59:59";
        }
        $vendas = Venda::whereBetween("created_at", [$inicio_time, $fim_time])->orderBy("created_at", "ASC")->get();
        return view("painel.vendas.consultar", ["vendas" => $vendas, "inicio" => $inicio, "fim" => $fim]);
    }

    public function visualizar(Venda $venda){
        if(!Util::acesso("vendas", "visualizar")){
            toastr()->error("Você não tem permissão para acessar essa página");
            return redirect()->back();
        }
        return view("painel.vendas.visualizar", ["venda" => $venda]);
    }

    public function receber_parcela(VendaParcela $parcela){
        $parcela->recebido = true;
        $parcela->save();
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
            if($request->tarjar && !$lote->reservado){
                $lote->reservado = true;
                $lote->save();
            }
            $produto = new CarrinhoProduto;
            $produto->carrinho_id = $carrinho->id;
            $produto->lote_id = $lote->id;
            $produto->quantidade = 1;
            $produto->total = $lote->preco * $produto->quantidade;
            $produto->save();

            $carrinho->reserva_id = $lote->reserva_id;
            $carrinho->total += $produto->total;
            $carrinho->save();
        }

        $venda->cliente_id = $cliente->id;
        $venda->assessor_id = ($request->assessor != 0) ? $request->assessor : null ;
        $venda->parcelas = $request->parcelas;
        
        $parcelas = $request->parcelas;
        $desconto = $request->desconto;
        $desconto_extra = $request->desconto_extra;
        $comissao = 0;

        $valor_desconto = $carrinho->produtos->sum("preco") * $desconto / 100;
        $valor_comissao = $comissao;
        $total_compra = $carrinho->total - $valor_desconto - $desconto_extra + $valor_comissao;

        $venda->carrinho_id = $carrinho->id;
        $venda->total = $total_compra;
        $venda->desconto = $valor_desconto;
        $venda->desconto_extra = $desconto_extra;
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
        $venda->valor_parcela = ($carrinho->total - $valor_desconto - $desconto_extra) / $parcelas;
        $venda->primeira_parcela = $request->primeira_parcela;
        $venda->tipo = 1;
        $venda->save();

        $venda->codigo = str_pad($venda->id, 11, "0", STR_PAD_LEFT);

        $venda->save();

        // $data = ["venda" => $venda];
        // $pdf = PDF::loadView('cliente.comprovante2', $data);
        // $pdf->save(public_path() . "/comprovantes/".$venda->id.".pdf");
        // $file = file_get_contents('templates/emails/confirmar-compra.html');
        // Email::enviar($file, "Confirmação de Compra", $cliente->email, false, public_path() . "/comprovantes/" . $venda->id . ".pdf");

        toastr()->success("Venda concluida");
        return redirect()->back();
    }

    public function lotes(){
        return view("painel.vendas.lotes");
    }

    public function envia_comprovante(Venda $venda){
        $data = ["venda" => $venda];
        $pdf = PDF::loadView('cliente.comprovante2', $data);
        $pdf->save(public_path() . "/comprovantes/".$venda->id.".pdf");
        $file = file_get_contents('templates/emails/confirmar-compra.html');
        if(Email::enviar($file, "Confirmação de Compra", $venda->cliente->email, false, public_path() . "/comprovantes/" . $venda->id . ".pdf")){
            toastr()->success("Email enviado com sucesso!");
        }else{
            toastr()->error("Erro ao enviar o email. Verifique o email cadastrado.");
        }
        
        return redirect()->back();
    }

    public function compradores(){
        $compradores = Cliente::whereHas("compras")->get();
        return view("painel.vendas.compradores", ["compradores" => $compradores]);
    }

}
