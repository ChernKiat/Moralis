<?php

namespace ChernKiat\Moralis;

use Illuminate\Support\ServiceProvider;

class MoralisServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/moralis.php' => config_path('moralis.php')
        ]);
    }

    public function register()
    {
        $this->app->singleton(Native::class, function() {
            return new Native();
        });

        $this->app->singleton(Storage::class, function() {
            return new Storage();
        });
    }
}
