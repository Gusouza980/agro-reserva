<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuiasController extends BaseController
{
    public function consultar(){
        return view("sistema.guias.consultar");
    }
}
