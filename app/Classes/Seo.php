<?php

namespace App\Classes;

use Illuminate\Support\Facades\Route;

class Seo
{
    public $titulo;
    public $tags;
    
    public function __construct(){
        $route_name = \Route::currentRouteName();
        $seo = \App\Models\Seo::where("nome", $route_name)->first();
        if($seo){
            $this->titulo = $seo->titulo;
            $this->tags = $seo->tags;
        }else{
            $this->titulo = "Agroreserva - Respeito pela sua jornada";
            $this->tags = "Gado, Agro, E-commerce, Lotes";
        }
    }

}
