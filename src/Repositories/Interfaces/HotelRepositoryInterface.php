<?php

namespace App\Repositories\Interfaces;

interface HotelRepositoryInterface
{
    public function all();

    public function find($id, array $columns = ['*']): array;

    public function create(array $attributes);

    public function destroy($id);

    public function update($id, array $input);
}