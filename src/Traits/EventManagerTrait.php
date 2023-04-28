<?php

namespace EventManager\Traits;

use DateTime;
use DateTimeZone;
use EventManager\Contracts\EventContract;
use ReflectionClass;
use ReflectionProperty;

trait EventManagerTrait
{
    protected $summary;

    protected $description;

    protected $startDate;

    protected $endDate;

    protected $timeZone = 'UTC';

    protected $location;

    protected $query;

    protected $format;

    public function __construct(null|EventContract $event = null)
    {
        $this->rebuild($event);
    }

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
        $this->startDate = $start;
        return $this;
    }

    public function getStartDate(): DateTime
    {
        return $this->startDate;
    }

    public function setEndDate(DateTime $end): self
    {
        $this->endDate = $end;
        return $this;
    }

    public function getEndDate(): DateTime
    {
        return $this->endDate;
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

    protected function rebuild(null | EventContract $event)
    {
        if (!$event) return;

        $reflectionEvent = new ReflectionClass($event);
        $properties = $reflectionEvent->getProperties(ReflectionProperty::IS_PROTECTED);

        foreach ($properties as $p) {

            $method = "get" . ucfirst($p->name);

            if (method_exists($this, $method) && property_exists($this, $p->name) && method_exists($this, "set" . ucfirst($p->name))) {
                $this->{$p->name} = $event->{$method}();
            }
        }
    }
}
