<?php

namespace App\Repositories\Interfaces;

interface  UserRepositoryInterface
{
    public function all();

    public function find($id, array $columns = array('*')): array;

    public function create(array $attributes);

    public function destroy($id);
}