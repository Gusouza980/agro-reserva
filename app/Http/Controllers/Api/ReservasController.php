<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
    public function ativas(){
        $reservas = Reserva::select('id', 'fazenda_id', 'fazendas.nome_fazenda', 'inicio', 'fim', 'aberto', 'encerrada', 'imagem_card')->where("ativo", true)->orderBy('inicio', 'DESC')->get();
        return response()->json($reservas);
    }
}
