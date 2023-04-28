<?php

use EventManager\Strategies\GooglrCalendar;
use EventManager\Strategies\ICal;
use EventManager\Strategies\Office365;

return [
    'drivers' => [
        'ical' => ICal::class,
        'office' => Office365::class,
        'google' => GooglrCalendar::class,
    ],
];
