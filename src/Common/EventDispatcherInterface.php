<?php

namespace App\Common;

interface EventDispatcherInterface
{

    public function dispatch(string $eventName): void;
}