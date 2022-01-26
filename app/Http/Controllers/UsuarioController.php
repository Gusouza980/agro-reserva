<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    //
    public function index(){
        $usuarios = Usuario::all();
        return view("painel.usuarios.consultar", ["usuarios" => $usuarios]);
    }

    public function salvar(Request $request){
        if($request->usuario_id){
            $usuario = Usuario::find($request->usuario_id);
        }else{
            $usuario = new Usuario;
        }

        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->acesso = $request->acesso;
        $usuario->usuario = $request->usuario;
        $usuario->ativo = $request->ativo;
        $usuario->foto = null;
        if($request->senha){
            $usuario->senha = Hash::make($request->senha);
        }
        $usuario->save();

        toastr()->success("Usuário salvo com sucesso!");
        return redirect()->back();
    }
}
