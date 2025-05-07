<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];
    
    protected function throttle(Throwable $e): string
    {
        
        return $e->getMessage();
    }

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            \DiscordAlert::to('erros')->message('', [
                [
                    'title' => "(" . $e->getCode() . ") " . $e->getMessage(),
                    'description' => "**Arquivo:** " . $e->getFile() . PHP_EOL . PHP_EOL . "**Linha:** " . $e->getLine(),
                    'color' => '#ff0000',
                ]
            ]);
        });
    }
}
