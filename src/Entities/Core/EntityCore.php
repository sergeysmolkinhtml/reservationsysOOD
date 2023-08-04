<?php

namespace App\Entities\Core;


use App\Modules\MySQLDatabase;

abstract class EntityCore
{

    public array $data = [];

    public function __construct(
    ) { }

    public function getId() : int
    {
        return $this->id;
    }

    public static function get(int $id)
    {
        return;
    }

    public function __set(string $name, $value) : void
    {
        $this->data[$name] = $value;
    }

    public function __get(string $name)
    {
       return $this->data[$name];
    }

    public function __isset(string $name) : bool
    {
        return isset($this->data[$name]);
    }


}