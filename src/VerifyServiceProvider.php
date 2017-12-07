<?php

namespace RifkyEkayama\Twillio\Verify;

use Illuminate\Support\ServiceProvider;

class VerifyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->publishes([
                __DIR__.'/config/verify.php' => config_path().'/verify.php',
            ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->registerRajaOngkir();

        $this->app->alias('Verify', 'RifkyEkayama\Twillio\Verify\Endpoints');
    }

    public function registerTwillioVerify(){
        $this->app->singleton('Verify', function (){
            return new Endpoints(config('verify.api_key'));
        });
    }
}
