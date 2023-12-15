<?php

namespace App\Facades;
use Exception;
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
            try{
                $content = file_get_contents($url);
                $data = json_decode($content, true);
                return $data;
            }catch(Exception $e){
                return false;
            }
        }else{
            return false;
        }
    }
}
