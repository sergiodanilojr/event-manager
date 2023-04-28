<?php

namespace EventManager\Strategies;

use EventManager\Contracts\EventContract;
use EventManager\Traits\EventManagerTrait;

class Office365 implements EventContract
{
    use EventManagerTrait;

    protected $format = 'Y-m-d\TH:i:s';

    public function getURL(): string
    {
        return 'https://outlook.office.com/calendar/deeplink/compose?' . $this->getQuery();
    }

    public function toArray(): array
    {
        $startAt = $this->dateFormater($this->startAt);
        $endAt = $this->dateFormater($this->endAt);

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
