<?php

namespace App\Services;



use App\Repositories\Interfaces\HotelRepositoryInterface;

final class HotelService extends ServiceCore
{

    public function __construct(
        private readonly HotelRepositoryInterface $hotelRepository
    ) {
        $this->data[] = 'test';
    }

    public function indexData()
    {
       echo $this->hotelRepository->all();
    }
}