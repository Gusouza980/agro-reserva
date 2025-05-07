<?php

namespace App\Classes\Agrisk\Apiary;
use Illuminate\Support\Facades\Http;
use App\Classes\Agrisk\Apiary\ApiaryError;

abstract class Apiary
{
    protected $url;
    protected $url_terms;
    private $authenticated = false;

    public $token;

    public $config;

    // ROTAS
    public $routes = [
        "login" => "login",
        "clients" => "clients",
        "client.detail" => "clients/client",
        "terms" => "terms",
    ];

    public function __construct(){
        $this->config = config("agrisk");
        $this->url = $this->config["url"];
        $this->url_terms = $this->config['url_terms'];

        $response = Http::post($this->url . $this->routes["login"], [
            'credential' => $this->config['apiary_credential'],
            'password' => $this->config['apiary_password'],
        ]);

        if($response->status() == 200){
            $this->authenticated = true;
            $this->token = $response->json()["token"];
        }else{
            $this->authenticated = false;
            \Log::emergency('Erro na autenticação da API', ["oject" => $response->object()]);
        }
    }

    public function getHeaders(){
        return [
            'Content-Type' => 'application/json'
        ];
    }

    public function isAuthenticated(){
        return $this->authenticated;
    }
}
