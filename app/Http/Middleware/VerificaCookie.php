<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Cookie;
use App\Models\Cliente;
use App\Models\Carrinho;

class VerificaCookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // dd(Cookie::get("cliente"));
        if(!session()->get("cliente") && Cookie::get('cliente')){
            $usuario = Cliente::find(Cookie::get('cliente'));
            $usuario->ultimo_acesso = date('Y-m-d');
            $usuario->save();
            // Cookie::queue('cliente', $usuario->id, 60);
            // $cookie = Cookie::forever('cliente', $usuario->id);
            session(["cliente" => $usuario->toArray()]);
            
            $carrinho = Carrinho::where([["cliente_id", $usuario->id], ["aberto", true]])->first();
            if($carrinho){
                session()->put(["carrinho" => true]);
            }
        }
        return $next($request);
    }
}
