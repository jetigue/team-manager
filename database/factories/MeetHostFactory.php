<?php

use Faker\Generator as Faker;

$factory->define(App\Models\MeetProperties\Host::class, function (Faker $faker) {
    return [
        'name'	=> $faker->lastName . " " . 'High School',
    ];
});
