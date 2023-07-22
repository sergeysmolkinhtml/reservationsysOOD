<?php

namespace App\Repositories;

use App\Repositories\Interfaces\HotelRepositoryInterface;

final class HotelRepository implements HotelRepositoryInterface
{

    /**
     * @return mixed
     */
    public function all()
    {
        return 'repo';
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
}