<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarketplaceCategoriasController extends Controller
{
    //

    public function consultar(){
        return view("painel.marketplace.categorias.consultar");
    }
}
