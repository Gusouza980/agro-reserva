<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    //
    public $usuario;

    public function __construct(){
        $this->middleware(function ($request, $next) {
            if(session()->get("admin")){
                if(isset(session()->get('admin')['acesso'])){
                    $this->usuario = Usuario::find(session()->get("admin")['id']);
                }else{
                    $this->usuario = Usuario::find(session()->get("admin"));
                }
            }
            View::share('usuario', $this->usuario);
            return $next($request);
        });
        
    }
}
