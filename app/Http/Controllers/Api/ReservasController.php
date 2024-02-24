<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
    public function ativas($page = 1, $qtd = 6) {
        $reservas = Reserva::select('id', 'inicio', 'fim', 'aberto', 'encerrada', 'imagem_card')->where("ativo", true)->orderBy('inicio', 'DESC')->skip($qtd * ($page - 1))->take($qtd)->get();
        return response()->json($reservas);
    }

    public function lotes($reservaId){
        $reserva = Reserva::with('lotes')->with('lotes.fazenda:id,nome_fazenda,logo')->find($reservaId);
        return response()->json($reserva);
    }
}
