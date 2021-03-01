<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Raca;

class RacasController extends Controller
{
    //
    public function index(){
        $racas = Raca::all();
        return view("painel.racas.index", ["racas" => $racas]);
    }

    public function cadastrar(Request $request){
        $raca = new Raca;
        $raca->nome = $request->nome;
        $raca->save();
        toastr()->success("Raça cadastrada com sucesso!");
        return redirect()->back();
    }   

    public function editar(Request $request, Raca $raca){
        $raca->nome = $request->nome;
        $raca->save();
        toastr()->success("Alterações salvas com sucesso!");
        return redirect()->back();
    }   

    public function excluir(Raca $raca){
        $raca->delete();
        toastr()->success("Raça excluida com sucesso!");
        return redirect()->back();
    }
}
