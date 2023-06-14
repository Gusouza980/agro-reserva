<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reserva;

class LotesController extends Controller
{
    //
    public function consultar(Reserva $reserva){
        return view("sistema.lotes.consultar", ["reserva" => $reserva]);
    }
}
