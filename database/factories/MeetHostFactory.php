<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Meets\Host::class, function (Faker $faker) {
    return [
        'name'	=> $faker->lastName . " " . 'High School',
    ];
});
