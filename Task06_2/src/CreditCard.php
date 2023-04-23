<?php

namespace App;

class CreditCard
{
    private $number;
    private $expiration;

    public function __construct($number, $expiration)
    {
        $this->number = $number;
        $this->expiration = $expiration;
    }

    public function authorizeTransaction($amount)
    {
        return "Authorization code: 234da";
    }
}
