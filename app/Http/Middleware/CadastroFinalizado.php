<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Fazenda;

class CadastroFinalizado
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
        $fazenda = Fazenda::find(session()->get("fazenda"));
        if(!$fazenda->finalizado){
            return redirect()->route("cadastro.passos");
        }else{
            return $next($request);
        }
    }
}
