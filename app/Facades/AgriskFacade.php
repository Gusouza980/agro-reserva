<?php

namespace App\Facades;
use Exception;
use Illuminate\Support\Facades\Facade;

class AgriskFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'agrisk';
    }
}
