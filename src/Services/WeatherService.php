<?php

namespace App\Services;

final class WeatherService
{

    public function getByCityId(int $cityId)
    {
        $apiKey = require_once '../config/weather.config.php';
        $url = "https://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey['owm']['apiKey'];
        $ch = curl_init();
        $response = $this->setCurl($ch,$url);
        curl_close($ch);
        $data = json_decode($response);
        return $data;
    }

    public function setCurl($ch, $url) : bool | string
    {
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        return $response;
    }

}