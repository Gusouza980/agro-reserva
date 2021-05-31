<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;

class ApiController extends Controller
{
    //

    public function getCidadesByUf($uf){
        $cidades = Cidade::where("id_estado", $uf)->get();
        return response()->json($cidades->toJson());   
    }

    public function calcDistanciaCep(Request $request){
        $res = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $request->origem . "&destinations=" . $request->destino . "&mode=driving&language=pt-BR&sensor=false&key=AIzaSyCDJEB7uVGEkVU0Utm3p9kOeCnastPy01o");
        return response()->json($res);
    }
}
