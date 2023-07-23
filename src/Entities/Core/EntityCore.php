<?php

namespace App\Entities\Core;

use Iterator;

abstract class EntityCore
{

    public function __construct(private readonly ?Int $id = null) {}

    public function getId() : int
    {
        return $this->id;
    }

    public function all()
    {
        return 'all from core';
    }

}