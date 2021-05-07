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
}
