<?php

namespace EventManager\Strategies;

use EventManager\Contracts\EventContract;
use EventManager\Traits\EventManagerTrait;

class ICal implements EventContract
{
    use EventManagerTrait;

    protected $format = 'Ymd\THis';

    public function getURL(): string
    {
        return 'data:text/calendar;base64,' . $this->getQuery();
    }

    public function toArray(): array
    {
        return [
            
        ];
    }

    public function getQuery(): string
    {
        $startAt = $this->dateFormater($this->startAt);
        $endAt = $this->dateFormater($this->endAt);

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
