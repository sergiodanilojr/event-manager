<?php

namespace EventManager\Strategies;

use EventManager\Contracts\EventContract;
use EventManager\EventTemplate;
use EventManager\Traits\EventManagerTrait;

class GoogleCalendar extends EventTemplate implements EventContract
{
    protected $format = 'Ymd\THis';

    public function getURL(): string
    {
        return 'https://www.google.com/calendar/render?' . $this->getQuery();
    }

    public function toArray(): array
    {
        $dates = implode('/', $this->getDates());

        return [
            'action' => 'TEMPLATE',
            'text' => $this->summary,
            'dates' => $dates,
            'details' => $this->description,
            'location' => $this->location,
            'ctz' => $this->timeZone,
        ];
    }

    public function getQuery(): string
    {
        return http_build_query($this->toArray());
    }

    public function download(string $name = 'event.ics'): void
    {
        return;
    }
}
