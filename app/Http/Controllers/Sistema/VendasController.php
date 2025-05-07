<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Venda;

class VendasController extends BaseController
{
    public function consultar(){
        return view("sistema.vendas.consultar");
    }

    public function detalhes(Venda $venda){
        return view("sistema.vendas.detalhes", ["venda" => $venda]);
    }
}
