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
        if(!session()->get("cliente") && Cookie::get('cliente')){
            $usuario = Cliente::find(Cookie::get('cliente'));
            $usuario->ultimo_acesso = date('Y-m-d');
            $usuario->save();
            // $cookie = Cookie::forever('cliente', $usuario->id);
            session(["cliente" => $usuario->toArray()]);
            
            $carrinhos = Carrinho::where([["cliente_id", $usuario->id], ["aberto", true]])->get();
            $carrinho_ids = [];
            
            foreach($carrinhos as $carrinho){
                if($carrinho->reserva_id == null){
                    $carrinho->delete();
                }else{
                    if(!session()->get("carrinho")){
                        session()->put("carrinho", []);
                    }
                    
                    session()->push("carrinho", ["id" => $carrinho->id, "reserva" => $carrinho->reserva_id]);
                }
            }
        }
        return $next($request);
    }
}
