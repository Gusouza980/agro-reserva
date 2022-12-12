<?php

namespace App\Classes\Funcoes;

use App\Models\Cliente;

class Clientes
{
    public static function getAgriskStatus(Cliente $cliente){
        if($cliente->agriskTermosFinalizado && $cliente->agriskTermosVerificado){
            return "Termos assinados e verificados!";
        }elseif($cliente->agriskTermosFinalizado && !$cliente->agriskTermosVerificado){
            return "Termos não aceitos.";
        }else{
            return "Termos não finalizados (Não respondidos ou respondidos incorretamente).";
        }
    }
}
