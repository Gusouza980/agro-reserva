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
        4 => "Jurídico",
        5 => "Financeiro"
    ];

    public static $permissoes = [
        "usuarios" => [0],
        "clientes" => [0, 5],
        "banners" => [0, 2, 3, 5],
        "reservas" => [0, 5],
        "vendas" => [0, 4],
        "tasks" => [0, 1, 2, 3, 4, 5],
        "guias" => [0, 1, 2, 3, 4, 5],
    ];

    public static function getPermissao($modulo, $usuario){
        if(in_array($usuario->acesso, self::$permissoes[$modulo])){
            return true;
        }else{
            return false;
        }
    }
}
