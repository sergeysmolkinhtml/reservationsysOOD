<?php

namespace App\Services\DeliveryServices;

use App\Contracts\DeliveryInterface;

final readonly class EurPoshtaDeliveryService implements DeliveryInterface
{

    protected HttpClientService $httpClient;
    protected Config $config;

    public function __construct(Config $config, HttpClientService $httpClient)
    {
        $this->config = $config;
        $this->httpClient = $httpClient;
    }

    public function send(array $packageData, array $customerData) : array
    {
        $data = [
            'customer_name' => $customerData['customer_name'],
            'phone_number' => $customerData['phone_number'],
            'email' => $customerData['email'],
            'sender_address' => $this->config->get('app.sender_address'),
            'delivery_address' => $customerData['delivery_address'],
        ];

        try {
            $response = $this->httpClient->post('https://ukrposhta.test/api/delivery', $data, [
                'Content-Type' => 'application/json',
                'X-API-Key' => 'some api key',
            ]);

            return $response->json(['message' => 'Successfully send']);

        } catch (\Exception $e) {
            return $response->json(['error' => 'Request error: ' . $e->getMessage()]);
        }
}