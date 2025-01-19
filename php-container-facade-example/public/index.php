<?php

use Src\Base\Container;
use Src\Base\Facade;
use Src\Facades\Stripe;
use Src\Providers\CieloPaymentProvider;
use Src\Providers\Interfaces\PaymentProviderContract;
use Src\Providers\PaddlePaymentProvider;
use Src\Providers\StripePaymentProvider;
use Src\Services\Checkout;
use Src\Utils\Http;

require __DIR__.'/../vendor/autoload.php';

// $container = new Container;
// $container->register(PaymentProviderContract::class, CieloPaymentProvider::class);

// $paymentProvider = $container->get(PaymentProviderContract::class);
// $service = new Checkout('andre@andre.com', 599);

// $cieloProvider = $container->get(PaymentProviderContract::class);

//echo $service->handle($paymentProvider);

echo Stripe::charge('comida', 2304);