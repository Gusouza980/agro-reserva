<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PainelLogado
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
        if(session()->get("admin")){
            return $next($request);
        }else{
            toastr()->error("Você precisa estar logado para acessar o painel");
            return redirect()->route("painel.login");
        }
        
    }
}
