<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservasController extends BaseController
{
    public function consultar(){
        return view("sistema.reservas.consultar");
    }

    public function uploadCatalogo(Request $request){
        $reserva = Reserva::find($request->reserva_id);
        $reserva->catalogo = $request->catalogo->store('uploads', 'local');
        $reserva->save();
        toastr()->success("Catálogo salvo com sucesso!");
        return redirect()->back();
    }
}
