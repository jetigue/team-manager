<?php

use Faker\Generator as Faker;

$factory->define(App\Models\TrackEvent::class, function (Faker $faker) {
    return [
        'event' => '1600 m',
        'distance' => 1600
    ];
});
