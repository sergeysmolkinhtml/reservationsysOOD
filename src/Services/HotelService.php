<?php

namespace App\Services;


use App\Repositories\Interfaces\HotelRepositoryInterface;

final class HotelService extends ServiceCore
{

    public function __construct(
        private readonly HotelRepositoryInterface $hotelRepository
    ) {}

    public function indexData() : array
    {
        $this->data['hotels'] = $this->hotelRepository->all();
        return $this->data;
    }

}