<?php

namespace App\Http\Controllers;

use App\Services\HotelService;
use League\Plates\Engine;

final class HotelController
{

    public function __construct(
        private readonly Engine $templateEngine,
        private readonly HotelService $hotelService
    ) {}

    public function index() : void
    {
        $data = $this->hotelService->data;
        echo $this->templateEngine->render('hotels/index', ['data' => $data]);
    }
}