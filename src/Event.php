<?php

namespace EventManager;

use EventManager\Contracts\EventContract;
use EventManager\Strategies\GoogleCalendar;
use EventManager\Strategies\ICal;
use EventManager\Strategies\Office365;

class Event
{
    public function toOffice(): EventContract
    {
        return new Office365;
    }

    public function toIcal(): EventContract
    {
        return new ICal;
    }

    public function toGoogleCalendar(): EventContract
    {
        return new GoogleCalendar;
    }
}