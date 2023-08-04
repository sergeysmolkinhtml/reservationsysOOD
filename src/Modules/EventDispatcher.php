<?php

namespace App\Modules;

use App\Concerns\EventDispatcherInterface;

final class EventDispatcher implements EventDispatcherInterface
{

    private array $listeners = [];

    public function addListener(
        string $event,
        callable $listener
    ): void {
        $this->listeners[$event] = $listener;
    }
    public function removeListener(string $event, callable $listener): void {
        foreach ($this->listenerFor($event) as $key => $callable) {
            if($callable == $listener) {
                unset($this->listeners[$event][$key]);
            }
        }
    }

    public function listenerFor(string $event) : array
    {
        if(isset($this->listeners[$event])) {
            return $this->listeners[$event];
        }
        return [];
    }

    /**
     * @param string $eventName
     * @return void
     */
    public function dispatch(string $eventName) : void
    {
        foreach ($this->listenerFor($eventName) as $callable) {
            $callable($eventName);
        }
    }
}