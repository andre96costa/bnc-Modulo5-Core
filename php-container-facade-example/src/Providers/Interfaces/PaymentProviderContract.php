<?php

namespace Src\Providers\Interfaces;

use Src\Utils\Http;

interface PaymentProviderContract
{
    public function __construct(Http $httpClient);

    public function charge(string $email, int $amount): string;
}
