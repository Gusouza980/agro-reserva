<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assessor;

class AssessoresController extends Controller
{
    //
    //
    public function index(){
        $assessores = Assessor::all();
        return view("painel.assessores.index", ["assessores" => $assessores]);
    }

    public function cadastrar(Request $request){
        $assessor = new Assessor;
        $assessor->nome = $request->nome;
        $assessor->telefone = $request->telefone;
        $assessor->save();
        toastr()->success("Assessor cadastrado com sucesso!");
        return redirect()->back();
    }   

    public function editar(Request $request, Assessor $assessor){
        $assessor->nome = $request->nome;
        $assessor->telefone = $request->telefone;
        $assessor->save();
        toastr()->success("Alterações salvas com sucesso!");
        return redirect()->back();
    }   

    public function excluir(Assessor $assessor){
        $assessor->delete();
        toastr()->success("Assessor excluído com sucesso!");
        return redirect()->back();
    }
}
