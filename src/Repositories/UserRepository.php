<?php

namespace App\Repositories;


use App\Entities\User;
use App\Repositories\Interfaces\UserRepositoryInterface;


final class UserRepository implements UserRepositoryInterface
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return void
     */
    public function all()
    {
        // TODO: Implement all() method.
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, array $columns = array('*')): array
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