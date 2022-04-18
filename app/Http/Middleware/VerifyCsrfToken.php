<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        '/api/logar',
        '/api/cadastro/finalizar',
        '/api/cadastro/finalizar/salvar',
        '/api/senha/recuperar'
    ];
}
