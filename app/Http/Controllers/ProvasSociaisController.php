<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProvaSocial;

class ProvasSociaisController extends Controller
{
    //

    public function index(){
        $provas = ProvaSocial::all();
        return view("painel.provas_sociais.index", ["provas" => $provas]);
    }

    public function salvar(Request $request){
        if($request->prova_id){
            $prova = ProvaSocial::find($request->prova_id);
        }else{
            $prova = new ProvaSocial;
        }

        $prova->nome = $request->nome;
        $prova->video = $request->video;

        if($request->file("thumbnail")){
            Storage::delete($prova->thumbnail);
            $prova->thumbnail = $request->file('thumbnail')->store(
                'site/imagens/provas_sociais/', 'local'
            );
        }

        $prova->save();

        toastr()->success("Prova social salva com sucesso!");
        return redirect()->back();
    }

    public function excluir(ProvaSocial $prova){
        Storage::delete($prova->thumbnail);
        $prova->delete();
        toastr()->success("Prova social removida com sucesso!");
        return redirect()->back();
    }
}
