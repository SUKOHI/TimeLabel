# TimeLabel
Laravel package to manage time labels like `This Month` and so on.

Installation
====

Add this package name in composer.json

    "require": {
      "sukohi/time-label": "2.*"
    }

Execute composer command.

    composer update

Register the service provider in app.php

    'providers' => [
        ...Others...,  
        Sukohi\TimeLabel\TimeLabelServiceProvider::class,
    ]

Also alias

    'aliases' => [
        ...Others...,  
        'TimeLabel'   => Sukohi\TimeLabel\Facades\TimeLabel::class
    ]

Usage
====

    $time_label = TimeLabel::setLabel([
        'today' => 'Today',
        'yesterday' => 'Yesterday',
        'this_month' => 'This Month',
        'last_month' => 'Last Month',
        'other' => 'M, Y'   // You need to set date format only here.
    ]);
    $date_times = [
        Carbon::now(),
        Carbon::now(),
        Carbon::now()->subDay(),
        Carbon::now()->subDay(),
        Carbon::now()->subDays(2),
        Carbon::now()->subDays(4),
        Carbon::now()->subDays(4),
        Carbon::now()->subDays(5),
        Carbon::now()->subDays(10),
        Carbon::now()->subDays(20),
        Carbon::now()->subDays(50),
        Carbon::now()->subDays(150),
    ];

    foreach($date_times as $dt) {

        if($time_label->isFirst($dt)) {

            echo $time_label->get($dt) .'<br>';

        }

        echo $dt .'<hr>';

    }

License
====

This package is licensed under the MIT License.

Copyright 2015 Sukohi Kuhoh