<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Imports\LotesImport;
use App\Models\Lote;
use Illuminate\Http\Request;
use App\Models\Reserva;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class LotesController extends BaseController
{
    //
    public function consultar(Reserva $reserva){
        return view("sistema.lotes.consultar", ["reserva" => $reserva]);
    }

    public function importar(Request $request){
        if($request->file("planilha")){
            $caminho = $request->file('planilha')->store(
                'tmp_planilha/', 'local'
            );
        }

        Excel::import(new LotesImport($request->reserva_id, $request->fazenda_id), $caminho);

        Storage::delete($caminho);

        $lotes = Lote::where("reserva_id", $request->reserva_id)->get();
        foreach($lotes as $lote){
            $lote->produto()->create([
                "nome" => $lote->nome,
                "preco" => ($lote->preco) ? $lote->preco : 0
            ]);
        }

        toastr()->success("Lotes importados com sucesso!");
        return redirect()->back();
    }
}
