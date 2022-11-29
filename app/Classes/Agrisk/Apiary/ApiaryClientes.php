<?php

namespace App\Classes\Agrisk\Apiary;

use App\Classes\Agrisk\Apiary\Apiary;
use Illuminate\Support\Facades\Http;

class ApiaryClientes extends Apiary
{
    // Criar um novo cliente no Agrisk
    // taxId = CPF
    public function createClient($taxId, $birthDate){
        $response = Http::withToken($this->token)->post($this->url . $this->routes["clients"], [
            'taxId' => $taxId,
            'birthDate' => $birthDate,
        ]);
        if($this->checkError($response)){
            $this->lastError = $response->object();
            return false;
        }else{
            return $response->object();
        }
    }

    public function listClients($taxId, $letter){
        $response = Http::withToken($this->token)->get($this->url . $this->routes["clients"] . "?" . "text=" . $taxId . "&client=1&groups=1&letter=" . $letter);
        if($this->checkError($response)){
            $this->lastError = $response->object();
            return false;
        }else{
            return $response->object();
        }
    }

    public function clientDetail($id){
        $response = Http::withToken($this->token)->get($this->url . $this->routes["client.detail"] . "/" . $id);
        if($this->checkError($response)){
            $this->lastError = $response->object();
            return false;
        }else{
            return $response->object();
        }
    }

    // RETORNA O TOKEN REFERENTE AOS TERMOS PARA O CLIENTE INFORMADO (STRING)
    // EM CASO DE ERRO RETORNA FALSE
    public function createTerms($id, $name, $taxId, $phone = null){
        $response = Http::withToken($this->token)->post($this->url_terms . $this->routes["terms"], [
            'clientId' => $id,
            'clientName' => $name,
            'clientTaxId' => $taxId,
            'companyId' => env("AGRISK_COMPANY_ID"),
            'companyName' => env("AGRISK_COMPANY_NAME"),
            'companyTaxId' => env("AGRISK_COMPANY_TAXID"),
        ]);

        if($this->checkError($response)){
            $this->lastError = $response->object();
            return false;
        }else{
            return $this->getTermsAuthorizationToken($response->object());
        }
    }

    public function termsDetail($termId){
        $response = Http::withToken($this->token)->get($this->url_terms . $this->routes["terms"] . "/" . $termId);
        dd($response->object());
        return $response;
    }

    private function getTermsAuthorizationToken($response){
        $url = "https://autorizacao.agrisk.digital/";
        $token = str_replace($url, "", $response->url);
        return $token;
    }
}
