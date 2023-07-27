<?php

namespace App\Repositories;

class RepositoryCore
{
    /**
     * @return mixed
     */
    public function getQueryCount() : mixed
    {
        return $this->query()->count();
    }

    /**
     * @return mixed
     */
    public function query() : mixed
    {
        return call_user_func(static::class . '::query');
    }
}