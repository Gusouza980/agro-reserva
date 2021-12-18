<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class VendedoresController extends Controller
{
    //
    public function index(){
        $vendedores = Cliente::where("vendedor", true)->get();
        return view("painel.vendedores.consultar", ["vendedores" => $vendedores]);
    }
}
