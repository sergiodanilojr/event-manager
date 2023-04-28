<?php

namespace EventManager\Strategies;

use EventManager\Contracts\EventContract;
use EventManager\EventTemplate;
use EventManager\Traits\EventManagerTrait;

class ICal extends EventTemplate implements EventContract
{
    protected $format = 'Ymd\THis';

    public function getURL(): string
    {
        return 'data:text/calendar;base64,' . $this->getQuery();
    }

    public function toArray(): array
    {
        return [];
    }

    public function getQuery(): string
    {
        $startAt = $this->dateFormater($this->startDate);
        $endAt = $this->dateFormater($this->endDate);

        return <<<ICS
        BEGIN:VCALENDAR
        VERSION:2.0
        BEGIN:VEVENT
        SUMMARY:{$this->summary}
        DESCRIPTION:{$this->description}
        LOCATION:{$this->location}
        DTSTART:{$startAt}
        DTEND:{$endAt}
        END:VEVENT
        END:VCALENDAR
        ICS;
    }

    public function download(string $name = 'event.ics'): void
    {
        return;
    }
}
