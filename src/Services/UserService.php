<?php

namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;

final class UserService extends ServiceCore
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
    )
    {
        $this->userRepository = $userRepository;
    }

    public function getAll()
    {
        return $this->userRepository->all();
    }
}