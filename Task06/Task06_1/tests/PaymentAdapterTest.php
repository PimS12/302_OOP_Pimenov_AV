<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\PayPal;
use App\CreditCard;
use App\PayPalAdapter;
use App\CreditCardAdapter;

class PaymentAdapterTest extends TestCase
{
    public function testCollectMoney(): void
    {
        $paypal = new PayPal('customer@aol.com', 'password');
        $cc = new CreditCard(1234567890123456, "09/22");

        $paypalAdapter = new PayPalAdapter($paypal);
        $ccAdapter = new CreditCardAdapter($cc);

        $this->assertSame("Paypal Success!", $paypalAdapter->paypal->transfer('customer@aol.com', 100));
        $this->assertSame("Authorization code: 234da", $ccAdapter->creditCard->authorizeTransaction(200));

        $this->assertTrue($paypalAdapter->collectMoney(100));
        $this->assertTrue($ccAdapter->collectMoney(200));
    }
}
