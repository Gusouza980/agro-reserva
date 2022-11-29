<?php

namespace App\Classes\Agrisk\Apiary;

class ApiaryError
{
    private $status;
    private $messages;

    public function __construct($response){
        $this->status = $response["statusCode"];
        $this->messages = collect($response["message"]);
    }

    public function getStatusCode(){
        return $this->status;
    }

    public function getArrayMessages(){
        return $this->messages->toArray();
    }

    public function getJsonMessages(){
        return $this->messages->toJson();
    }
}
