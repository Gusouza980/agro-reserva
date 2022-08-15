<?php

namespace App\Http\Controllers;

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

        // VERIFICANDO SE É UM CLIENTE APROVADO
        if(!$cliente->aprovado){
            return redirect()->route("index");
        }
        
        $carrinho = Carrinho::find($request->carrinho_id);
        $reservados = false;

        // VERIFICANDO SE ALGUM PRODUTO DO CARRINHO FOI RESERVADO DURANTE O PROCESSO DE COMPRA
        foreach($carrinho->carrinho_produtos as $carrinho_produto){
            if($carrinho_produto->produto->produtable->reservado){
                $carrinho_produto->delete();
                $carrinho->save();
                $reservados = true;
            }
        }

        if($reservados){
            session()->flash("erro", "Não foi possível finalizar sua compra porque um ou mais lotes que estavam no seu carrinho já foram reservados.");
            return redirect()->route("carrinho");
        }else{
            // RESERVADO TODOS OS LOTES DO CARRINHO
            Lote::whereIn("id", $carrinho->produtos()->with("produtable")->get()->pluck("produtable")->flatten()->pluck("id"))->update(["reservado" => true]);
        }

        // GERANDO A VENDA
        $venda = new Venda;
        $venda->carrinho_id = $carrinho->id;
        $venda->cliente_id = session()->get("cliente")["id"];
        $venda->assessor_id = ($request->assessor != 0) ? $request->assessor : null ;
        $venda->parcelas = $request->parcelas;

        $parcelas = $request->parcelas;

        $forma_pagamento = $carrinho->reserva->formas_pagamento->where("minimo", "<=", $parcelas)->where("maximo", ">=", $parcelas)->first();

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
        $venda->valor_parcela = $total_compra / $parcelas;
        $venda->tipo = 1;
        $venda->save();

        $venda->codigo = str_pad($venda->id, 11, "0", STR_PAD_LEFT);

        $venda->save();

        $cont_parcelas = 0;
        $data_parcela = date("Y-m-d");
        if($forma_pagamento->regras->count() > 0){
            foreach($forma_pagamento->regras as $regra){
                for($i = 0; $i < $regra->meses; $i++){
                    for($j = 0; $j < $regra->parcelas; $j++){
                        $dias_mes = date("t", strtotime($data_parcela . " +" . $i . " Months"));
                        $intervalo_parcelas_mes = intval($dias_mes / $regra->parcelas); 
                        $data_parcela = date("Y-m-d", strtotime($data_parcela . " +" . $intervalo_parcelas_mes . " Days"));
                        $nova_parcela = new VendaParcela;
                        $nova_parcela->venda_id = $venda->id;
                        $nova_parcela->numero = $cont_parcelas + 1;
                        $nova_parcela->valor = $venda->valor_parcela;
                        $nova_parcela->vencimento = date("Y-m-d", strtotime($data_parcela));
                        $nova_parcela->save();
                        $cont_parcelas++;
                    }
                }
            }
        }

        if($cont_parcelas < $parcelas){
            for($i = $cont_parcelas; $i < $parcelas; $i++){
                $data_parcela = date("Y-m-d", strtotime($data_parcela . " +1 Month"));
                $nova_parcela = new VendaParcela;
                $nova_parcela->venda_id = $venda->id;
                $nova_parcela->numero = $i + 1;
                $nova_parcela->valor = $venda->valor_parcela;
                $nova_parcela->vencimento = date("Y-m-d", strtotime($data_parcela));
                $nova_parcela->save();
            }
        }
        
        $carrinho->aberto = false;
        $carrinho->save();

        session()->forget("carrinho");
        // $data = ["venda" => $venda];
        // $pdf = PDF::loadView('cliente.comprovante2', $data);
        // $pdf->save(public_path() . "/comprovantes/".$venda->id.".pdf");
        // $file = file_get_contents('templates/emails/confirmar-compra.html');
        // Email::enviar($file, "Confirmação de Compra", session()->get("cliente")["email"], false, public_path() . "/comprovantes/" . $venda->id . ".pdf");
        session()->flash("reserva_finalizada");
        return redirect()->route('conta.index');
    }

    public function abertos(){
        $carrinhos = Carrinho::where("aberto", true)->get();
        return view("painel.carrinhos.index", ["carrinhos" => $carrinhos]);
    }
}
