<?php

use EventManager\EventFacade;

$facade = new EventFacade;

// Drivers
$google = $facade->toGoogleCalendar();
$ical = $facade->toIcal();
$office = $facade->toOffice();

// google
$google
    ->setDescription('Vai ser top demais, sô!')
    ->setLocation('Av. das Laranjeiras, 2001')
    ->setSummary('Connect Devs Confference')
    ->setStartDate(new DateTime('+1MONTH'))
    ->setEndDate((new DateTime())->modify('+ 35 days'))
    ->setTimeZone('America/Sao_Paulo');

$google->getURL();
$google->getQuery();
$google->toArray();
$google->download();
