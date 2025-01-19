<?php

namespace App\Services\PaymentProviders\Interfaces;

use App\Services\Utils\Http;

interface PaymentProviderContract
{
    public function __construct(Http $httpClient);

    public function charge(string $email, int $amount): string;
}
