<?php

namespace Src\Facades;

use Src\Base\Facade;
use Src\Providers\StripePaymentProvider;

class Stripe extends Facade
{

    protected static function getFacadeAccessor(): string
    {
        return StripePaymentProvider::class;
    }
}
