<?php

namespace App\Repositories;

use App\Modules\MySQLDatabase;
use App\DTO\AvailableHotelDTO;
use App\Repositories\Interfaces\AvailableHotelsRepositoryInterface;
use PDO;

final readonly class AvailableHotelsRepository implements AvailableHotelsRepositoryInterface
{

    /**
     * @param string $today
     * @return array
     */
    public function availableHotels(string $today) : array
    {
        $rows = MySQLDatabase::getInstance()->query('SELECT * FROM reservDB.hotels')->fetchAll(PDO::FETCH_ASSOC); #TODO

        return array_map(function (array $row) {
            $hotels = new AvailableHotelDTO();
            $hotels->name = $row;
            return $hotels;
        },$rows);
    }
}