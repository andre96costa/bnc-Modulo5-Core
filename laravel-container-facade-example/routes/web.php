<?php

use App\Facades\Stripe;
use App\Http\Controllers\CieloController;
use App\Http\Controllers\PaddleController;
use App\Http\Controllers\StripeController;
use Facades\App\Services\PaymentProviders\PaddlePaymentProvider;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/learn-container', function(/*StripePaymentProvider $paymentProvides*/) { //Passando diretamente na rota, o laravel vai fazer a injeção de dependencia.
   //$paymentProvides = app(CieloPaymentProvider::class); //O helper app() chama o Service Container criado pelo próprio laravel. 
    // $checkout = new Checkout('andre@andre.com', 499);
    // return $checkout->handle($paymentProvides);
    return Stripe::charge('andre@andre.com', 499) . " " . PaddlePaymentProvider::charge('andre@andre.com', 600);
});

Route::get('/stripe', [StripeController::class, 'index']);
Route::get('/cielo', [CieloController::class, 'index']);
Route::get('/paddle', [PaddleController::class, 'index']);