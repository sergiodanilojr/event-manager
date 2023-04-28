<?php

namespace EventManager\Traits;

use DateTime;
use DateTimeZone;

trait EventManagerTrait
{
    protected $summary;

    protected $description;

    protected DateTime $startAt;

    protected DateTime $endAt;

    protected $timeZone = 'UTC';

    protected $location;

    protected $query;

    protected $format;

    public function setSummary(string $summary): self
    {
        $this->summary = $summary;
        return $this;
    }

    public function getSummary(): string
    {
        return $this->summary;
    }

    public function setDescription(string $description): self
    {

        $this->description = $description;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setStartDate(DateTime $start): self
    {
        $this->startAt = $start;
        return $this;
    }

    public function getStartDate(): DateTime
    {
        return $this->startAt;
    }

    public function setEndDate(DateTime $end): self
    {
        $this->endAt = $end;
        return $this;
    }

    public function getEndDate(): DateTime
    {
        return $this->endAt;
    }

    public function setTimeZone(string | DateTimeZone $timezone = 'UTC'): self
    {
        $this->timeZone = $timezone;

        if (is_string($timezone)) {
            $this->timeZone = new DateTimeZone($timezone);
        }

        return $this;
    }

    public function getTimeZone(): DateTimeZone
    {
        return $this->timeZone;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;
        return $this;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    protected function dateFormater(DateTime $date)
    {
        return $date->setTimezone($this->timeZone ?? $this->setTimeZone())->format($this->format ?? 'Ymd\THis');
    }
}
