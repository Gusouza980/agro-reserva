<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lote;
use App\Models\Reserva;
use Illuminate\Support\Facades\Log;

class RotinasController extends Controller
{
    //

    public function calcula_recomendacoes(){
        $reservas = Reserva::where([["aberto", true], ['encerrada', false]])->get();
        $lotes = Lote::whereIn("reserva_id", $reservas)->get();
        $relevancias = [];
        $recomendados = [];
        for($i = 0; $i < $lotes->count(); $i++){
            $lote1 = $lotes[$i];
            $num_chaves = $lote1->chaves->count();
            if($num_chaves > 0){
                $recomendados[$lote1->id] = [];
            }
            $relevancias[$i] = [];
            for($j = 0; $j < $lotes->count(); $j++){
                if($i != $j){
                    $relevancias[$i][$j] = 0;
                    $lote2 = $lotes[$j];
                    foreach($lote1->chaves as $chave){
                        if($lote2->chaves->contains($chave)){
                            $relevancias[$i][$j]++;
                        }
                    }
                    if($num_chaves > 0){
                        if((($relevancias[$i][$j] * 100) / $num_chaves) >= 100){
                            if($relevancias[$i][$j] < 2){
                                dd(($relevancias[$i][$j] * 100) / $num_chaves);
                            }
                            $recomendados[$lote1->id][] = $lote2->id; 
                            
                        }
                    }
                }
            }
            
        }
        foreach($recomendados as $key => $recomendados){
            $lote1 = Lote::find($key);
            foreach($recomendados as $recomendado){
                $lote1->recomendados()->attach($recomendado);
            }
        }

        toastr()->success("Recomendações definidas com sucesso!");

        return redirect()->back();
    }
}
