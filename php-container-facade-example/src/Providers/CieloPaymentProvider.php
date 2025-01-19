<?php

namespace Src\Providers;

use Src\Providers\Interfaces\PaymentProviderContract;
use Src\Utils\Http;

class CieloPaymentProvider implements PaymentProviderContract
{
    public function __construct(
        Http $clientHttp
    ) {}
    
    public function charge(string $email, int $amount): string
    {
        return "We successfully charged BRL {$amount} from {$email}";
    }
}
