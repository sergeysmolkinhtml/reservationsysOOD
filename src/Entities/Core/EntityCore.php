<?php

namespace App\Entities\Core;

abstract class EntityCore
{
    public function __construct(protected Int $id) {}

    public function getId() : int
    {
        return $this->id;
    }

}