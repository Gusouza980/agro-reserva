<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FazendaLogada
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
        if(session()->get("fazenda")){
            return $next($request);
        }else{
            return redirect()->route("index");
        }
        
    }
}
