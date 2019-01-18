<?php

namespace Baorv\Cleverreach;

use Baorv\CleverReach\Contracts\HttpClientContract;
use Baorv\CleverReach\Http\GuzzleHttpClient;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../cleverreach.php' => config_path('cleverreach.php'),
        ], 'config');
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../cleverreach.php', 'cleverreach');
        $this->app->singleton(HttpClientContract::class, function () {
            return new GuzzleHttpClient(
                config('cleverreach.client_id'),
                config('cleverreach.client_secret'),
                config('cleverreach.access_token')
            );
        });
    }
}