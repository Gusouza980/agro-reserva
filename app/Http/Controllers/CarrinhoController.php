<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lote;
use App\Models\Cliente;
use App\Models\Carrinho;
use App\Models\CarrinhoProduto;
use App\Models\Venda;
use App\Classes\Email;
use Illuminate\Support\Str;
use PDF;

class CarrinhoController extends Controller
{
    //

    public function carrinho(){
        $cliente = Cliente::find(session()->get("cliente")["id"]);
        if(!$cliente->aprovado){
            return redirect()->route("index");
        }
        $carrinho = Carrinho::find(session()->get("carrinho"));
        if(!$carrinho){
            return redirect()->route("index");
        }
        $ceps = array();
        $fazendas = array();

        foreach($carrinho->lotes as $lote){
            // dd($lote->fazenda);
            if(!in_array($lote->fazenda->nome_fazenda, $fazendas)){
                array_push($fazendas, $lote->fazenda->nome_fazenda);
                array_push($ceps, $lote->fazenda->cep);
            }
        }
        return view("carrinho", ["carrinho" => $carrinho, "ceps" => $ceps, "fazendas" => $fazendas]);
    }

    public function adicionar(Lote $lote){
        $cliente = Cliente::find(session()->get("cliente")["id"]);
        if(!$cliente->aprovado){
            return redirect()->route("index");
        }
        if(session()->get("carrinho")){
            $carrinho = Carrinho::find(session()->get("carrinho"));
        }else{
            $carrinho = new Carrinho;
            $carrinho->cliente_id = session()->get("cliente")["id"];
            $carrinho->aberto = true;
            $carrinho->save();
            session(["carrinho" => $carrinho->id]);
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
        $carrinho->save();

        toastr()->success("Produto adicionado ao carrinho !");
        return redirect()->back();
    }

    public function deletar(CarrinhoProduto $produto){
        $carrinho = Carrinho::find(session()->get("carrinho"));
        $carrinho->total -= $produto->lote->preco;
        $carrinho->save();
        $produto->delete();
        toastr()->success("Produto removido do carrinho.");
        return redirect()->back();
    }

    public function limpa(){
        include_once(app_path() . '/Apis/_functions.php');

        /* link especifico */
        $url = 'https://api.bscommerce.com.br/carrinho/';

        /* array de dados - insere item no carrinho */
        $data =  array(
            "token" => $tokenapi,
            "ope"   => "delCarrinho",
            "user"  => session()->get('userid'),
            "uuid"  => session()->get('useruuid')
        );

        /* envia dados e recebe retorno */
        $retorno = callAPI($url, $data);
        return redirect()->back();
    }

    public function checkout(){
        $cliente = Cliente::find(session()->get("cliente")["id"]);
        if(!$cliente->aprovado){
            return redirect()->route("index");
        }
        $carrinho = Carrinho::find(session()->get("carrinho"));
        if(!$carrinho){
            return redirect()->route("index");
        }
        return view("checkout", ["carrinho" => $carrinho]);
    }

    public function concluir(Request $request){
    
        // round($produto->lote->preco / $i, 2);
        $cliente = Cliente::find(session()->get("cliente")["id"]);
        if(!$cliente->aprovado){
            return redirect()->route("index");
        }
        $carrinho = Carrinho::find(session()->get("carrinho"));
        $reservados = false;
        foreach($carrinho->produtos as $produto){
            if($produto->lote->reservado){
                $carrinho->total -= $produto->lote->preco;
                $produto->delete();
                $carrinho->save();
                $reservados = true;
            }
        }

        if($reservados){
            session()->flash("erro", "Um ou mais lotes que estavam no seu carrinho já foram reservados.");
            return redirect()->route("carrinho");
        }else{
            $carrinho->lotes()->update(['reservado' => true]);
        }

        $venda = new Venda;
        $venda->carrinho_id = $carrinho->id;
        $venda->cliente_id = session()->get("cliente")["id"];
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

        $venda->total = $total_compra;
        $venda->desconto = $valor_desconto;
        $venda->comissao = $valor_comissao;
        $venda->valor_parcela = ($carrinho->total - $valor_desconto) / $parcelas;
        $venda->tipo = 1;
        $venda->save();

        $venda->codigo = str_pad($venda->id, 11, "0", STR_PAD_LEFT);

        $venda->save();

        // foreach($produtos as $produto){
        //     foreach($produto as $lid => $parcelas){
        //         $lote = $carrinho->lotes->where("id", $lid)->first();
        //         $parcelas = $parcelas;
        //     }
        //     if($lote->reservado){
        //         session()->flash("Um ou mais lotes que estavam no seu carrinho já foram reservados.");
        //         $produto_carrinho = CarrinhoProduto::where([["lote_id", $lote->id], ["carrinho_id", $carrinho->id]])->first();
        //         $produto_carrinho->delete();
        //         $carrinho->total -= $lote->preco;
        //         $carrinho->save();
        //     }else{
        //         $lote->reservado = true;
        //         $lote->fechado_por = 0;
        //         $lote->save();
        //         $venda = new Venda;
        //         $venda->carrinho_id = $carrinho->id;
        //         $venda->lote_id = $lote->id;
        //         $venda->assessor_id = ($request->assessor != 0) ? $request->assessor : null ;
        //         $venda->fazenda_id = $lote->fazenda_id;
        //         $venda->cliente_id = $carrinho->cliente_id;
        //         $venda->parcelas = $parcelas;
        //         $valor_parcela = round($lote->preco / $venda->parcelas, 2);
        //         $venda->total = $valor_parcela * $venda->parcelas;
        //         $venda->valor_parcela = $valor_parcela;
        //         $venda->tipo = 1;
        //         $venda->save();
        //         $venda->codigo = str_pad($venda->id, 11, "0", STR_PAD_LEFT);
        //         $venda->save();
        //     }
        // }
        
        $carrinho->aberto = false;
        $carrinho->save();
        $data = ["venda" => $venda];
        $pdf = PDF::loadView('cliente.comprovante', $data);
        $pdf->save(public_path() . "/comprovantes/".$venda->id.".pdf");
        $file = file_get_contents('templates/emails/confirmar-compra.html');
        Email::enviar($file, "Confirmação de Compra", session()->get("cliente")["email"], false, public_path() . "/comprovantes/" . $venda->id . ".pdf");
        session()->forget("carrinho");
        session()->flash("reserva_finalizada");
        return redirect()->route('conta.index');
    }

    public function abertos(){
        $carrinhos = Carrinho::where("aberto", true)->get();
        return view("painel.carrinhos.index", ["carrinhos" => $carrinhos]);
    }
}
