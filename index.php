<?php
require_once __DIR__ . '/vendor/autoload.php';

use EventManager\Event;
use EventManager\EventFactory;

$event = new Event;

// Drivers
$google = $event->toGoogleCalendar();

// $ical = $event->toIcal();
// $office = $event->toOffice();

// google
$google
    ->setDescription('Vai ser top demais, sô!')
    ->setLocation('Av. das Laranjeiras, 2001')
    ->setSummary('Connect Devs Confference')
    ->setStartDate(new DateTime('+1MONTH'))
    ->setEndDate((new DateTime())->modify('+ 35 days'))
    ->setTimeZone('America/Sao_Paulo');

// actions
$url = $google->getURL();
$query = $google->getQuery();
$data = $google->toArray();

// factory 

$factory = new EventFactory;

$factory
    ->setDescription('Vai ser top demais, sô!')
    ->setLocation('Av. das Laranjeiras, 2001')
    ->setSummary('Connect Devs Confference')
    ->setStartDate(new DateTime('+1MONTH'))
    ->setEndDate((new DateTime())->modify('+ 35 days'))
    ->setTimeZone('America/Sao_Paulo');

$toIcal = $factory->toIcal();

$toGoogleCalendar = $factory->toGoogleCalendar();

$toOffice = $factory->toOffice();

dd(compact('factory', 'toIcal', 'toGoogleCalendar', 'toOffice'), $toGoogleCalendar->getURL());
