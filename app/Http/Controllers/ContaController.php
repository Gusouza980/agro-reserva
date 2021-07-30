<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Boleto;
use Illuminate\Support\Facades\Storage;

class ContaController extends Controller
{
    //
    public function index(){
        if(session()->get("cliente")){
            $cliente = Cliente::find(session()->get("cliente")["id"]);
            return view("cliente.index", ["cliente" => $cliente]);
        }else{
            return rout("index");
        }
    }
    
    public function baixar_boleto(Boleto $boleto){
        return Storage::download($boleto->caminho, $boleto->descricao . " " . date("d-m-Y", strtotime($boleto->validade)) . ".pdf");
    }
}
