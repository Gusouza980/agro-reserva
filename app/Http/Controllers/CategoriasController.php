<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class CategoriasController extends Controller
{
    //
    public function consultar(){
        if(!Util::acesso("noticias", "consulta")){
            toastr()->error("Você não tem permissão para acessar essa página");
            return redirect()->back();
        }
        $categorias = Categoria::all();
        return view("painel.categorias.consultar", ["categorias" => $categorias]);
    }

    public function cadastrar(Request $request){
        $request->validate([
            'nome' => 'unique:categorias,nome',
        ]);

        $categoria = new Categoria;
        $categoria->nome = $request->nome;
        $categoria->slug = Str::slug($request->nome);
        $categoria->save();

        toastr()->success("Categoria salva com sucesso!");
        return redirect()->back();
    }

    public function salvar(Request $request, Categoria $categoria){
        $request->validate([
            'nome' => 'unique:categorias,nome,'.$categoria->id,
        ]);

        $categoria->nome = $request->nome;
        $categoria->slug = Str::slug($request->nome);
        $categoria->save();

        toastr()->success("Categoria salva com sucesso!");
        return redirect()->back();
    }

    public function deletar(Categoria $categoria){
        $categoria->delete();
        toastr()->success("Categoria removida com sucesso!");
        return redirect()->back();
    }
}
