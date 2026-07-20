<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;

class LinkedInServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Http::macro('linkedin', function () {
            return Http::withOptions([
                'verify' => config('app.env') !== 'local', // Disable SSL verification in local environment
            ])->withHeaders([
                'X-Restli-Protocol-Version' => '2.0.0',
                'Content-Type' => 'application/json',
            ]);
        });
    }
}