<?php

namespace App\Http\Controllers;


use App\Services\HotelService;
use League\Plates\Engine;

final readonly class HotelController
{

    public function __construct(
        private Engine       $templateEngine,
        private HotelService $hotelService
    ) {}

    public function index() : void
    {
        $data = $this->hotelService->indexData();
        echo $this->templateEngine->render('hotels/index',['data' => $data]);
    }
}