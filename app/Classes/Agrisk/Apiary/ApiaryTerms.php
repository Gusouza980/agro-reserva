<?php

namespace App\Classes\Agrisk\Apiary;

class ApiaryTerms
{
    public $termId;
    public $companyName;
    public $clientName;
    public $term;
    public $questions;

    public function __construct($termId, $companyName, $clientName, $term, $questions){
        $this->termId = $termId;
        $this->companyName = $companyName;
        $this->clientName = $clientName;
        $this->term = $term;
        $this->questions = collect($questions);
        $this->formatTerm();
    }

    public function getQuestionsArray(){
        return $this->questions->toArray();
    }

    public function getQuestionsJson(){
        return $this->questions->toJson();
    }

    private function formatTerm(){
        $this->term = "Eu, <b>" . $this->clientName . "</b>, " . lcfirst($this->term);
        $this->term = str_replace("Empresa acima", "empresa <b>" . strtoupper($this->companyName) . "</b>", $this->term);
    }
}
