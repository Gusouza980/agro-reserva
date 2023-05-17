<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuariosController extends BaseController
{
    //
    public function consultar(){
        return view("sistema.usuarios.consultar");
    }
}
