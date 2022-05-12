<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MarketplaceVendedor;
use App\Models\MarketplaceProduto;
use App\Models\MarketplaceProdutoSemen;

class MarketplaceProdutosController extends Controller
{
    //

    public function consultar(MarketplaceVendedor $vendedor){
        return view("painel.marketplace.produtos.consultar", ["vendedor" => $vendedor]);
    }

    public function cadastrar(MarketplaceVendedor $vendedor){
        return view("painel.marketplace.produtos.cadastrar", ["vendedor" => $vendedor]);
    }

    public function editar(MarketplaceVendedor $vendedor, MarketplaceProduto $produto){
        return view("painel.marketplace.produtos.editar", ["vendedor" => $vendedor, "produto" => $produto]);
    }

    public function salvar(Request $request, MarketplaceVendedor $vendedor){
        if($request->marketplace_produto_id){
            $produto = MarketplaceProduto::find($request->marketplace_produto_id);
            $produto->ativo = $request->ativo;
            $novo = false;
        }else{
            $produto = new MarketplaceProduto;
            $produto->ativo = 0;
            $novo = true;
        }

        $produto->marketplace_vendedor_id = $vendedor->id;
        $produto->nome = $request->nome;
        $produto->resumo = $request->resumo;
        $produto->segmento = $request->segmento;
        $produto->descricao = $request->descricao;
        // $produto->estoque = $request->estoque;
        $produto->estoque = 0;
        $produto->valor = $request->valor;
        $produto->parcelas = $request->parcelas;

        if($request->boleto){
            $produto->boleto = 1;
        }else{
            $produto->boleto = 0;
        }

        if($request->cartao){
            $produto->cartao = 1;
        }else{
            $produto->cartao = 0;
        }

        $produto->save();

        switch($request->segmento){
            case(0):
                $this->semen($produto, $request, $novo);
                break;
            default:
                break;
        }

        return redirect()->route("painel.marketplace.vendedores.produtos", ['vendedor' => $vendedor]);
    }

    private function semen(MarketplaceProduto $produto, Request $request, $novo){
        
        if($novo){
            $semen = new MarketplaceProdutoSemen;
        }else{
            $semen = $produto->produtable;
        }
        
        $semen->raca_id = $request->raca_id;
        $semen->nascimento = $request->nascimento;
        $semen->registro = $request->registro;
        $semen->proprietario = $request->proprietario;
        $semen->pai = $request->pai;
        $semen->mae = $request->mae;
        $semen->avo_paterno = $request->avo_paterno;
        $semen->avo_paterna = $request->avo_paterna;
        $semen->avo_materno = $request->avo_materno;
        $semen->avo_materna = $request->avo_materna;
        $semen->linhagem = $request->linhagem;
        $semen->doses = $request->doses;
        $semen->save();
        if($novo){
            $produto->produtable_type = 'App\Models\MarketplaceProdutoSemen';
            $produto->produtable_id = $semen->id;
            $produto->save();
        }
    }
}
