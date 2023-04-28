<?php

namespace EventManager\Strategies;

use EventManager\Contracts\EventContract;
use EventManager\EventTemplate;
use EventManager\Traits\EventManagerTrait;

class Office365 extends EventTemplate implements EventContract
{
    protected $format = 'Y-m-d\TH:i:s';

    public function getURL(): string
    {
        return 'https://outlook.office.com/calendar/deeplink/compose?' . $this->getQuery();
    }

    public function toArray(): array
    {
        $startAt = $this->dateFormater($this->startDate);
        $endAt = $this->dateFormater($this->endDate);

        return [
            'subject' => $this->summary,
            'startdt' => $startAt,
            'enddt' => $endAt,
            'location' => $this->location,
            'body' => $this->description,
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
