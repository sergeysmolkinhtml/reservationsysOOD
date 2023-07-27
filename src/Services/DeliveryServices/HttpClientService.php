<?php

namespace App\Services\DeliveryServices;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

final class HttpClientService
{
    /**
     * @throws GuzzleException
     */
    public function post(string $url, array $headers = []) : ResponseInterface
    {
        return (new Client())->request('POST',$url,$headers);
    }

}