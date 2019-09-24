<?php

namespace App\Providers;

use App\Service\RailFence;
use App\Service\TurningGrille;
use Illuminate\Support\ServiceProvider;

class TranspositionCipherServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(RailFence::class, function ($app, $params) {
            return new RailFence($params[0], $params[1]);
        });

        $this->app->singleton(TurningGrille::class, function ($app, $params) {
            return new TurningGrille($params[0]);
        });
    }

    public function boot()
    {

    }
}