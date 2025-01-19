<?php

namespace App\Providers;

use App\Http\Controllers\CieloController;
use App\Http\Controllers\PaddleController;
use App\Http\Controllers\StripeController;
use App\Services\PaymentProviders\CieloPaymentProvider;
use App\Services\PaymentProviders\Interfaces\PaymentProviderContract;
use App\Services\PaymentProviders\PaddlePaymentProvider;
use App\Services\PaymentProviders\StripePaymentProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //$this->app->bind(PaymentProviderContract::class, StripePaymentProvider::class);
        //Contextual biding - A Injeção de dependencia precisa estar no construtor.
        $this->app->when(StripeController::class)->needs(PaymentProviderContract::class)->give(StripePaymentProvider::class);
        $this->app->when(CieloController::class)->needs(PaymentProviderContract::class)->give(CieloPaymentProvider::class);
        $this->app->when(PaddleController::class)->needs(PaymentProviderContract::class)->give(PaddlePaymentProvider::class);

        //Facade
        $this->app->bind('stripe-provider', fn($app) => $app->make(StripePaymentProvider::class));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
