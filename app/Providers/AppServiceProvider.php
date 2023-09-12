<?php

namespace App\Providers;

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\OfficeController;
use App\Models\Currency;
use App\Models\Office;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(OfficeController::class, function ($app) {
            return new OfficeController($app->make(Office::class));
        });

        $this->app->bind(CurrencyController::class, function ($app) {
            return new CurrencyController($app->make(Currency::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
