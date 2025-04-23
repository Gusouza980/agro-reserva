<?php

namespace App\Http\Controllers\Sistema;

use App\Exports\ClientesExport;
use Maatwebsite\Excel\Facades\Excel;

class ClientesController extends BaseController
{
    public function consultar(){
        return view("sistema.clientes.consultar");
    }

    public function detalhes($cliente_id){
        return view("sistema.clientes.detalhes", ['cliente_id' => $cliente_id]);
    }

    public function exportar($tipo){
        return Excel::download(new ClientesExport($tipo), "clientes_{$tipo}.xlsx");
    }
}
