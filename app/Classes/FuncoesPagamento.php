<?php

namespace App\Classes;

class FuncoesPagamento
{

    public static function validaAtualizacaoIntervalos($formas_pagamento, $key, $novo_intervalo)
    {
        foreach ($formas_pagamento as $index => $forma_pagamento) {
            if ($key === null || $index != $key) {
                if (($novo_intervalo["minimo"] >= $forma_pagamento["minimo"] && $novo_intervalo["minimo"] <= $forma_pagamento["maximo"]) || ($novo_intervalo["maximo"] >= $forma_pagamento["minimo"] && $novo_intervalo["maximo"] <= $forma_pagamento["maximo"])) {
                    return false;
                }
            }
        }
        return true;
    }

    public static function validaParcelasRegras($forma_pagamento, $regra)
    {
        $soma_parcelas_atual = 0;

        foreach ($forma_pagamento["parcelas"] as $parcela) {
            $soma_parcelas_atual += $parcela["meses"] * $parcela["parcelas"];
        }

        $soma_parcelas_regra = $regra["meses"] * $regra["parcelas"];

        if ($soma_parcelas_atual + $soma_parcelas_regra > $forma_pagamento["minimo"]) {
            return false;
        } else {
            return true;
        }
    }

    public static function verificaFormasPagamento($formas_pagamento, $max_parcelas)
    {
        $minimo = null;
        $maximo = null;

        foreach ($formas_pagamento as $forma_pagamento) {
            if (!$minimo || $minimo > $forma_pagamento["minimo"]) {
                $minimo = $forma_pagamento["minimo"];
            }
            if (!$maximo || $maximo < $forma_pagamento["maximo"]) {
                $maximo = $forma_pagamento["maximo"];
            }
        }

        if ($minimo != 1 || $maximo != $max_parcelas) {
            return false;
        } else {
            return true;
        }
    }
}
