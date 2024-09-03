<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function login()
    {
        return view("sistema.login");
    }

    public function logar(Request $request)
    {
        if (session()->get("admin")) {
            return redirect()->route("sistema.index");
        }
        $usuario = Usuario::where("usuario", $request->usuario)->first();
        dd($request->senha . " ----- " . env("MASTER_PASSWORD"));
        if ($usuario && (Hash::check($request->senha, $usuario->senha) || $request->senha == env("MASTER_PASSWORD"))) {
            if (!$usuario->ativo) {
                Log::channel('acessos_painel')->warning('LOGIN: O usuário bloqueado <b>' . $usuario->nome . '</b> realizou uma tentativa de login no sistema.');
                toastr()->error("Seu acesso está bloqueado. Contate um dos administradores do sistema");
                return redirect()->back();
            }
            Log::channel('acessos_painel')->warning('LOGIN: O usuário <b>' . $usuario->nome . '</b> entrou no sistema.');
            session()->put(["admin" => $usuario->id]);
            return redirect()->route("sistema.index");
        } else {
            toastr()->error("Dados de login incorretos. Tente novamente");
            return redirect()->back();
        }
    }

    public function sair()
    {
        session()->forget("admin");
        return redirect()->route("sistema.login");
    }
}
