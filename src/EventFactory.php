<?php

namespace EventManager;

use EventManager\Contracts\EventContract;

class Event
{
    protected $event;

    public function make(EventContract $event)
    {
        $this->event = $event;
    }

    public function getURL(): string
    {
        return $this->event->getURL();
    }
    
    public function toArray(): array
    {
        return $this->event->toArray();
    }

    public function getQuery(): string
    {

        return $this->event->getQuery();
    }

    public function download(string $name = 'event.ics'): void
    {
        $this->event->download();
    }
}
