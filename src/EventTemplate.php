<?php

namespace EventManager;

use EventManager\Contracts\EventContract;
use EventManager\Traits\EventManagerTrait;

abstract class EventTemplate implements EventContract
{
    use EventManagerTrait;

    protected function getDates(): array
    {
        $startAt = $this->dateFormater($this->startDate);
        $endAt = $this->dateFormater($this->endDate);

        return [$startAt, $endAt];
    }
}