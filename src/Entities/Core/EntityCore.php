<?php

namespace App\Entities\Core;

abstract class EntityCore
{

    public function __construct(private readonly ?Int $id = null) {}

    public function getId() : int
    {
        return $this->id;
    }

}