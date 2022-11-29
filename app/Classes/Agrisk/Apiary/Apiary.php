<?php

namespace App\Classes\Agrisk\Apiary;
use Illuminate\Support\Facades\Http;
use App\Classes\Agrisk\Apiary\ApiaryError;

abstract class Apiary
{
    public $url;
    public $url_terms;
    public $credential;
    public $password;
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
        $this->credential = env("AGRISK_APIARY_CREDENTIAL");
        $this->password = env("AGRISK_APIARY_PASSWORD");
        
        if(env("AGRISK_ENV") == 'producao'){
            $this->url = env("AGRISK_URL");
        }else{
            $this->url = env("AGRISK_URL_HOMOLOGACAO");
        }

        $this->url_terms = env("AGRISK_URL_TERMS");

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
        if(isset($response->statusCode)){
            return true;
        }else{
            return false;
        }
    }
}
