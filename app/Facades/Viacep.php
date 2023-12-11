<?php

namespace App\Facades;
use Illuminate\Support\Facades\Facade;

class Viacep extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'viacep';
    }

    public static function getData($cep){
        $cep = limparString($cep);
        if(strlen($cep) === 8){
            $url = "https://viacep.com.br/ws/$cep/json/";
            $data = json_decode(file_get_contents($url), true);
            return $data;
        }else{
            return false;
        }
    }
}
