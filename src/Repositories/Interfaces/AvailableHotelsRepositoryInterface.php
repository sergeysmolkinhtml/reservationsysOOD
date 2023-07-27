<?php

namespace App\Repositories\Interfaces;

use App\DTO\AvailableHotelDTO;

interface AvailableHotelsRepositoryInterface
{
    /**
     * @param string $today
     * @return AvailableHotelDTO[]
     */
    public function availableHotels(string $today) : array;
}