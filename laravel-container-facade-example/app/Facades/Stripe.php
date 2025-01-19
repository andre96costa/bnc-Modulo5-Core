<?php

namespace App\Facades;

use App\Services\PaymentProviders\StripePaymentProvider;
use Illuminate\Support\Facades\Facade;

class Stripe extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'stripe-provider';
    }
}
