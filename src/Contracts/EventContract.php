<?php

namespace EventManager\Contracts;

use DateTime;
use DateTimeZone;

interface EventContract
{
    public function setSummary(string $summary): self;
    public function getSummary(): string;

    public function setDescription(string $description): self;
    public function getDescription(): string;

    public function setStartDate(DateTime $start): self;
    public function getStartDate(): DateTime;

    public function setEndDate(DateTime $end): self;
    public function getEndDate(): DateTime;

    public function setTimeZone(string | DateTimeZone $timezone): self;
    public function getTimeZone(): DateTimeZone;
    
    public function setLocation(string $location): self;
    public function getLocation(): string;

    public function getURL():string;
    public function toArray():array;
    public function getQuery():string;
    public function download(string $name = 'event.ics'):void;
}
