<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assessor;
use App\Models\Venda;
use Illuminate\Support\Facades\DB;

class AssessoresController extends Controller
{
    //
    //
    public function index(){
        $assessores = Assessor::all();
        $vendas = DB::table("vendas")->join('assessors', 'assessors.id', '=', 'vendas.assessor_id')->select("assessors.nome", DB::raw('count(*) as total'))->groupBy("assessors.nome")->get();
        // dd($vendas);
        return view("painel.assessores.index", ["assessores" => $assessores, "vendas" => $vendas]);
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
