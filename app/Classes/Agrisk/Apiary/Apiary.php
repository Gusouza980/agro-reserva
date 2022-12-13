<?php

namespace App\Classes\Agrisk\Apiary;
use Illuminate\Support\Facades\Http;
use App\Classes\Agrisk\Apiary\ApiaryError;

abstract class Apiary
{
    public $url = "https://api.agrisk.digital/";
    public $url_terms = "https://scr-auth-v2.agrisk.digital/";
    public $credential = "111021656462";
    public $password = "Lgserrania22@";
    public $companyName = "Agro Reserva Pecuaria Digital LTDA";
    public $companyId = "0676c982-bdad-4f53-93af-ef829bb22148";
    public $companyTaxId = "41893302000113";
    private $authenticated = false;
    private $lastError;

    public $token;

    // ROTAS
    public $routes = [
        "login" => "login",
        "clients" => "clients",
        "client.detail" => "clients/client",
        "terms" => "terms",
    ];

    public function __construct(){
        
        if(env("AGRISK_ENV") == 'homologacao'){
            $this->url = env("AGRISK_URL_HOMOLOGACAO");
        }

        $response = Http::post($this->url . $this->routes["login"], [
            'credential' => $this->credential,
            'password' => $this->password,
        ]);

        if($response->status() == 200){
            $this->authenticated = true;
            $this->token = $response->json()["token"];
        }else{
            $this->authenticated = false;
            $this->lastError = $response->object();
        }
    }

    public function isAuthenticated(){
        return $this->authenticated;
    }

    public function getLastError(){
        return $this->lastError;
    }

    public function checkError($response){
        if(isset($response->statusCode) || (isset($response->status) && $response->status == 'error')){
            return true;
        }else{
            return false;
        }
    }
}
