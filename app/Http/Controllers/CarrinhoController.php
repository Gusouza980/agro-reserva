<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessaCompra;
use Illuminate\Http\Request;
use App\Models\Lote;
use App\Models\Cliente;
use App\Models\Carrinho;
use App\Models\CarrinhoProduto;
use App\Models\VendaParcela;
use App\Models\Venda;
use App\Classes\Email;
use Illuminate\Support\Str;
use PDF;
use Illuminate\Support\Facades\Log;

class CarrinhoController extends Controller
{
    //

    public function carrinho(){
        $cliente = Cliente::find(session()->get("cliente")["id"]);
        if(!$cliente->aprovado){
            return redirect()->route("index");
        }

        $carrinhos = Carrinho::where([["cliente_id", session()->get("cliente")["id"]], ["aberto", true]])->get();

        return view("carrinho", ["carrinhos" => $carrinhos]);
    }

    public function adicionar(Lote $lote){
        $cliente = Cliente::find(session()->get("cliente")["id"]);
        if(!$cliente->aprovado){
            return redirect()->route("index");
        }

        $carrinho = null;

        if(session()->get("carrinho")){
            foreach(session()->get("carrinho") as $car){
                if($car["reserva"] == $lote->reserva_id){
                    $carrinho = Carrinho::find($car["id"]);
                }
            }
        }

        if(!$carrinho){
            $carrinho = new Carrinho;
            $carrinho->cliente_id = session()->get("cliente")["id"];
            $carrinho->aberto = true;
            $carrinho->reserva_id = $lote->reserva_id;
            $carrinho->save();
            if(!session()->get("carrinho")){
                session()->put("carrinho", []);
            }
            session()->push("carrinho", ["id" => $carrinho->id, "reserva" => $carrinho->reserva_id]);
        }

        if($carrinho->produtos->where("lote_id", $lote->id)->count() > 0){
            session()->flash("erro", "O lote já está em seu carrinho");
            return redirect()->route("carrinho");
        }

        $produto = new CarrinhoProduto;
        $produto->carrinho_id = $carrinho->id;
        $produto->lote_id = $lote->id;
        $produto->quantidade = 1;
        $produto->total = $lote->preco * $produto->quantidade;
        $produto->save();

        $carrinho->total += $produto->total;
        if(!$carrinho->reserva_id){
            $carrinho->reserva_id = $lote->reserva_id;
        }
        $carrinho->save();

        toastr()->success("Produto adicionado ao carrinho !");
        return redirect()->back();
    }

    public function deletar(CarrinhoProduto $produto){
        $produto->delete();
        toastr()->success("Produto removido do carrinho.");
        return redirect()->back();
    }

    public function checkout(Carrinho $carrinho){
        $cliente = Cliente::find(session()->get("cliente")["id"]);
        if(!$cliente->aprovado){
            return redirect()->route("index");
        }
        if(!$carrinho){
            return redirect()->route("index");
        }
        return view("checkout", ["carrinho" => $carrinho]);
    }

    public function concluir(Request $request){
        $cliente = Cliente::find(session()->get("cliente")["id"]);
        \Log::channel("vendas")->info("O cliente " . $cliente->nome_dono . " iniciou a finalização de sua compra do carrinho #" . $request->carrinho_id);

        // VERIFICANDO SE É UM CLIENTE APROVADO
        if(!$cliente->aprovado){
            \Log::channel("vendas")->info("A compra do cliente " . $cliente->nome_dono . " não foi finalizada, pois o cliente não é aprovado na plataforma");
            return redirect()->route("index");
        }

        $carrinho = Carrinho::find($request->carrinho_id);

        // GERANDO A VENDA
        $venda = new Venda;
        $venda->carrinho_id = $carrinho->id;
        $venda->cliente_id = session()->get("cliente")["id"];
        $venda->assessor_id = ($request->assessor != 0) ? $request->assessor : null ;
        $venda->parcelas = $request->parcelas;

        $forma_pagamento = $carrinho->reserva->formas_pagamento->where("minimo", "<=", $venda->parcelas)->where("maximo", ">=", $venda->parcelas)->first();

        $desconto = $forma_pagamento->desconto;

        if($carrinho->reserva->desconto_live_ativo && $carrinho->reserva->desconto_live_valor){
            $desconto += $carrinho->reserva->desconto_live_valor;
        }

        $total = $carrinho->produtos->sum("preco");

        $valor_desconto = ($total * $desconto) / 100;
        $total_compra = $total - $valor_desconto;

        $venda->total = $total_compra;
        $venda->desconto = $valor_desconto;
        $venda->porcentagem_desconto = $desconto;
        $venda->porcentagem_venda = 100;
        $venda->dias_entre_parcelas = 30;
        $venda->parcelas_mes = 1;
        $venda->valor_parcela = $total_compra / $venda->parcelas;
        $venda->tipo = 1;
        $venda->save();

        $venda->codigo = str_pad($venda->id, 11, "0", STR_PAD_LEFT);

        $venda->save();

        \Log::channel("vendas")->info("A compra do cliente " . $cliente->nome_dono . " foi finalizada com sucesso, recebendo o código #" . $venda->codigo);

        ProcessaCompra::dispatch($venda, $forma_pagamento);

        session()->forget("carrinho");
        session()->flash("venda", $venda->id);
        
        return redirect()->route('carrinho.concluido');
    }

    public function concluido(){
        if(session()->get("venda")){
            $venda = Venda::find(session()->get("venda"));
            $cliente = Cliente::find(session()->get("cliente")['id']);
            return view("concluir", ['venda' => $venda, 'cliente' => $cliente]);
        }else{
            return redirect()->route("conta.index");
        }
    }

    public function abertos(){
        $carrinhos = Carrinho::where("aberto", true)->get();
        return view("painel.carrinhos.index", ["carrinhos" => $carrinhos]);
    }
}
