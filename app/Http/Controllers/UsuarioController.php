<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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

    public function alterar_senha(Request $request){
        $usuario = Usuario::find(session()->get("admin")["id"]);
        if(!Hash::check($request->senha_antiga, $usuario->senha)){
            toastr()->error("A senha antiga informada não esta correta.");
            return redirect()->back();
        }
        $usuario->senha = Hash::make($request->senha_nova);
        $usuario->save();
        toastr()->success("Senha alterada com sucesso!");
        return redirect()->back();
    }

    public function excluir(Usuario $usuario){
        if(session()->get("admin")["acesso"] != 0){
            toastr()->error("Você não possui acesso para realizar essa operação");
            return redirect()->back();
        }else{
            if($usuario->noticias->count() > 0){
                toastr()->error("Esse usuário não pode ser removido, pois possui noticias ligadas a ele.");
                return redirect()->back();
            }else{
                $usuario->delete();
                toastr()->success("Usuário removido com sucesso.");
                return redirect()->back();
            }
        }
    }
}
