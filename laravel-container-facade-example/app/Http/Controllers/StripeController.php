<?php

namespace App\Http\Controllers;

use App\Services\Checkout;
use App\Services\PaymentProviders\Interfaces\PaymentProviderContract;
use App\Services\PaymentProviders\StripePaymentProvider;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function __construct(
        protected PaymentProviderContract $paymentProvides
    ) {}
    
    public function index()
    {
        $checkout = new Checkout('andre@andre.com', 499);
        return $checkout->handle($this->paymentProvides);
    }
}
