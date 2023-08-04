<?php

namespace App\Concerns;

interface EventDispatcherInterface
{

    public function dispatch(string $eventName): void;
}