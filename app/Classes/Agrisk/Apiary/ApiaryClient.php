<?php

namespace App\Classes\Agrisk\Apiary;

class ApiaryClient
{
    public $id;
    public $taxId;
    public $name;
    public $taxIdStatus;
    public $lastUpdateDate;

    public function __construct($id, $taxId = null, $name = null, $taxIdStatus = null, $lastUpdateDate = null) {
        $this->id = $id;
        $this->taxId = $taxId;
        $this->name = $name;
        $this->taxIdStatus = $taxIdStatus;
        $this->lastUpdateDate = $lastUpdateDate;
    }
}
