<?php

namespace App\Classes\Agrisk\Apiary;

class ApiaryError
{
    private $status;
    private $messages;

    public function __construct($status, $messages){
        $this->status = $status;
        $this->messages = collect($messages);
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
