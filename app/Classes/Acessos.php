<?php

namespace App\Classes;

use App\Models\Usuario;

class Acessos
{
    public static $niveis = [
        0 => "Admin",
        1 => "Comercial",
        2 => "Digital",
        3 => "Criação",
        4 => "Jurídico"
    ];

    public static $permissoes = [
        "usuarios" => [0],
        "banners" => [0, 2, 3]
    ];

    public static function getPermissao($modulo){
        $usuario = Usuario::find(session()->get("admin"));
        if(in_array($usuario->acesso, self::$permissoes[$modulo])){
            return true;
        }else{
            dd($modulo);
            return false;
        }
    } 
}
