<?php

namespace EventManager;

use EventManager\Contracts\EventContract;
use EventManager\Strategies\GoogleCalendar;
use EventManager\Strategies\ICal;
use EventManager\Strategies\Office365;
use EventManager\Traits\EventManagerTrait;
use Exception;

class EventFactory implements EventContract
{
    use EventManagerTrait;

    protected $event;

    public function make(EventContract $event)
    {
        $this->event = $event;
    }

    public function toOffice(): EventContract
    {
        $this->event = new Office365($this);
        return $this->event;
    }

    public function toIcal(): EventContract
    {
        return $this->event = new ICal($this);
    }

    public function toGoogleCalendar(): EventContract
    {
        return $this->event = new GoogleCalendar($this);
    }

    public function getURL(): string
    {
        $this->checkEvent();

        return $this->event->getURL();
    }

    public function toArray(): array
    {
        $this->checkEvent();
        return $this->event->toArray();
    }

    public function getQuery(): string
    {

        $this->checkEvent();
        return $this->event->getQuery();
    }

    public function download(string $name = 'event.ics'): void
    {
        $this->checkEvent();
        $this->event->download();
    }

    private function checkEvent(): void
    {
        if (!$this->event) {
            throw new Exception('Informe o Driver do Evento!');
        };
    }
}
