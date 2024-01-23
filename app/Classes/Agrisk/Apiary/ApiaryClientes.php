<?php

namespace App\Classes\Agrisk\Apiary;

use App\Classes\Agrisk\Apiary\Apiary;
use Illuminate\Support\Facades\Http;
use App\Classes\Util;

class ApiaryClientes extends Apiary
{
    // Criar um novo cliente no Agrisk
    // taxId = CPF
    // RETORNO: Um Objeto com os campos id, companyId, taxId, kind
    // Caso o cliente já tenha cadastro noa agrisk é retornando um erro normal, porém contendo o campo clientId referente ao cliente 
    public function createClient($taxId, $birthDate){
        $response = Http::withToken($this->token)->post($this->url . $this->routes["clients"], [
            'taxId' => $taxId,
            'birthDate' => $birthDate,
        ]);
        return $response;
    }

    public function listClients($taxId, $letter){
        $response = Http::withToken($this->token)->get($this->url . $this->routes["clients"] . "?" . "text=" . $taxId . "&client=1&groups=1&letter=" . $letter);
        return $response;
    }

    public function clientDetail($id){
        $response = Http::withToken($this->token)->get($this->url . $this->routes["client.detail"] . "/" . $id);
        return $response;
    }

    // RETORNA O TOKEN REFERENTE AOS TERMOS PARA O CLIENTE INFORMADO (STRING)
    // EM CASO DE ERRO RETORNA FALSE
    public function createTerms($id, $name, $taxId){
        $response = Http::withToken($this->token)->post($this->url_terms . $this->routes["terms"], [
            'clientId' => $id,
            'clientName' => $name,
            'clientTaxId' => $taxId,
            'companyId' => $this->config['company_id'],
            'companyName' => $this->config['company_name'],
            'companyTaxId' => $this->config['company_taxid'],
        ]);
        return $response;
    }

    public function termsDetail($termId){
        $response = Http::withToken($this->token)->get($this->url_terms . $this->routes["terms"] . "/" . $termId);
        return $response;
    }

    // RETORNA UMA MENSAGEM DE "APPROVED" OU "REPROVED"
    public function sendAnswers($termId, $respostas){
        $response = Http::withToken($this->token)->post($this->url_terms . $this->routes["terms"] . "/" . $termId . "/answers", [
            "answers" => $respostas
        ]);
        return $response;
    }

    public function sendTermsToken($token, $telefone){
        $response = Http::withToken($this->token)->post($this->url_terms . $this->routes["terms"] . "/" . $token . "/token", [
            "method" => "WhatsApp",
            "phone" => Util::limparString($telefone)
        ]);
        return $response;
    }

    public function verificarCodigo($token, $otpToken, $deviceCode){
        $ip = $_SERVER['REMOTE_ADDR'];
        // $ip = '187.102.60.187';
        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
        $geolocalizacao = explode(",", $details->loc);
        $latitude = $geolocalizacao[0];
        $longitude = $geolocalizacao[1];
        $response = Http::withToken($this->token)->post($this->url_terms . $this->routes["terms"] . "/" . $token . "/sign", [
            "termId" => $token,
            "otpToken" => $otpToken,
            "clientIp" => $ip,
            "geolocation" => [
                "latitude" => $latitude,
                "longitude" => $longitude
            ],
            "deviceCode" => $deviceCode
        ]);
        return $response;
    }

    public function getTermsAuthorizationToken($termUrl){
        $array = explode('/', $termUrl);
        $token = array_pop($array);
        return $token;
    }
}
