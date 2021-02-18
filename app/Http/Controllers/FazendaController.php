<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Fazenda;
use App\Models\FazendaRaca;

class FazendaController extends Controller
{

    public function index(){
        $fazendas = Fazenda::all();
        
    }

    public function cadastro(){
        return view("painel.fazendas.cadastro");
    }
}
