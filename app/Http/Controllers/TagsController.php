<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagsController extends Controller
{
    //
    public function consultar(){
        $tags = Tag::all();
        return view("painel.tags.consultar", ["tags" => $tags]);
    }

    public function cadastrar(Request $request){
        $request->validate([
            'nome' => 'unique:tags,nome',
        ]);

        $tag = new Tag;
        $tag->nome = $request->nome;
        $tag->save();

        toastr()->success("Tag salva com sucesso!");
        return redirect()->back();
    }

    public function salvar(Request $request, Tag $tag){
        $request->validate([
            'nome' => 'unique:tags,nome,'.$tag->id,
        ]);

        $tag->nome = $request->nome;
        $tag->save();

        toastr()->success("Tag salva com sucesso!");
        return redirect()->back();
    }

    public function deletar(Tag $tag){
        $tag->delete();
        toastr()->success("Tag removida com sucesso!");
        return redirect()->back();
    }
}
