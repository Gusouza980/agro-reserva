<?php

namespace App\Http\Controllers\Sistema;

class ClientesController extends BaseController
{
    public function consultar(){
        return view("sistema.clientes.consultar");
    }

    public function detalhes($cliente_id){
        return view("sistema.clientes.detalhes", ['cliente_id' => $cliente_id]);
    }
}
