<?php

namespace App\Classes;
use App\Models\Venda;

class FuncoesVenda{

    public static function atualizaValores(Venda $venda){
        
        $total_carrinho = $venda->carrinho->produtos->sum("preco");
        $valor_desconto = $total_carrinho * $venda->porcentagem_desconto / 100;
        $total_compra = $total_carrinho - $valor_desconto - $venda->desconto_extra;
        $venda->total = $total_compra;
        $venda->desconto = $valor_desconto;
        $venda->valor_parcela = $total_compra / $venda->parcelas;

        foreach($venda->getRelationValue("parcelas") as $parcela){
            $parcela->valor = $venda->valor_parcela;
            $parcela->save();
        }

        $venda->save();
    }

}

?>