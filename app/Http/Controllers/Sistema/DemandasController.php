<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DemandasController extends BaseController
{
    public function consultar(){
        return view("sistema.demandas.consultar");
    }
}
