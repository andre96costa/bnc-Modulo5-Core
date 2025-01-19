<?php

namespace App\Http\Controllers;

use App\Services\Checkout;
use App\Services\PaymentProviders\Interfaces\PaymentProviderContract;
use Illuminate\Http\Request;

class CieloController extends Controller
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
