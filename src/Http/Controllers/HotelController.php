<?php

namespace App\Http\Controllers;


use App\Repositories\AvailableHotelsRepository;
use App\Repositories\Interfaces\AvailableHotelsRepositoryInterface;
use App\Services\HotelService;
use League\Plates\Engine;

final class HotelController extends HotelCoreController
{

    public function __construct(
        private readonly Engine       $templateEngine,
        private readonly AvailableHotelsRepositoryInterface $hotelsRepository,
        private readonly HotelService $hotelService
    ) {}

    public function index() : void
    {
        $this->hotels = $this->hotelsRepository->availableHotels('32.3.2003');
        $result = $this->hotelService->indexData($this->data);
        $this->data += $this->hotels + $result;
        echo $this->templateEngine->render('hotels/index',['hotels' => $this->data[0]]);
    }
}