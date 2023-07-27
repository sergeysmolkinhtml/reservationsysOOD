<?php

namespace App\Contracts;

interface DeliveryInterface
{
    public function send(array $packageData, array $customerData);
}