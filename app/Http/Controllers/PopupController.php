<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Popup;

class PopupController extends Controller
{
    //

    public function index(){
        $popups = Popup::all();
        return view("painel.popups.index", ["popups" => $popups]);
    }

    public function cadastrar(Request $request){
        $popup = new Popup;
        
        $popup->modelo = 0;
        $popup->pagina = 0;
        $popup->descricao = $request->descricao;
        $popup->inicio = $request->inicio;
        $popup->fim = $request->fim;

        if($request->visitante){
            $popup->visitante = true;
        }else{
            $popup->visitante = false;
        }

        if($request->precadastro){
            $popup->precadastro = true;
        }else{
            $popup->precadastro = false;
        }

        if($request->finalizado){
            $popup->finalizado = true;
        }else{
            $popup->finalizado = false;
        }

        $popup->ativo = true;

        if($request->file("imagem")){
            // Storage::delete($popup->imagem);
            $popup->imagem = $request->file('imagem')->store(
                'imagens/popups/', 'local'
            );
        }

        $popup->save();

        toastr()->success("Popup salvo com sucesso!");
        return redirect()->back();
    }

    public function editar(Request $request, Popup $popup){
        $popup->modelo = 0;
        $popup->pagina = 0;
        $popup->descricao = $request->descricao;
        $popup->inicio = $request->inicio;
        $popup->fim = $request->fim;

        if($request->visitante){
            $popup->visitante = true;
        }else{
            $popup->visitante = false;
        }

        if($request->precadastro){
            $popup->precadastro = true;
        }else{
            $popup->precadastro = false;
        }

        if($request->finalizado){
            $popup->finalizado = true;
        }else{
            $popup->finalizado = false;
        }

        $popup->ativo = true;

        if($request->file("imagem")){
            Storage::delete($popup->imagem);
            $popup->imagem = $request->file('imagem')->store(
                'imagens/popups/', 'local'
            );
        }

        $popup->save();

        toastr()->success("Popup salvo com sucesso!");
        return redirect()->back();
    }
}
