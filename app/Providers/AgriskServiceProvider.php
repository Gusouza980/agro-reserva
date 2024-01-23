<?php

namespace App\Providers;

use App\Services\AgriskService;
use Illuminate\Support\ServiceProvider;

class AgriskServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('agrisk', function () {
            return new AgriskService();
        });
    }
}

?>