<?php

namespace App\Http\Controllers;

use App\Contracts\DeliveryInterface;
use GuzzleHttp\Psr7\Request;

final readonly class DeliveryController
{
    protected DeliveryInterface $delivery;
    public function __construct(DeliveryInterface $delivery)
    {
        $this->delivery = $delivery;
    }

    public function sendDeliveryData(\HttpRequest $request)
    {
       $response = $this->delivery->send($request->getPostFields());
    }


}