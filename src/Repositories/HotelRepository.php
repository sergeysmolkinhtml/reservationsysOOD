<?php

namespace App\Repositories;

use App\Entities\Hotel;
use App\Repositories\Interfaces\HotelRepositoryInterface;

final class HotelRepository implements HotelRepositoryInterface
{
    protected Hotel $hotel;

    public function __construct()
    {
        $this->hotel = new Hotel('1');
    }

    /**
     * @return string
     */
    public function all()
    {
        return $this->hotel->all();
    }

    /**
     * @param $id
     * @param array $columns
     * @return array
     */
    public function find($id, array $columns = ['*']) : array
    {
        // TODO: Implement find() method.
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        // TODO: Implement create() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }

    /**
     * @param $id
     * @param array $input
     * @return mixed
     */
    public function update($id, array $input)
    {
        // TODO: Implement update() method.
    }
}