<?php

namespace Binaryk\LaravelRestify;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RestifyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->registerRoutes();
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        $config = [
            'namespace' => 'Binaryk\LaravelRestify\Http\Controllers',
            'as' => 'restify.api.',
            'prefix' => Restify::path(),
            'middleware' => config('restify.middleware', []),
        ];

        Route::group($config, function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        });
    }
}
