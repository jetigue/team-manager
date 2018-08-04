<?php

use Faker\Generator as Faker;

$factory->define(App\Models\RaceProperties\Division::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement($array = array ('Varsity', 'Junior Varsity', 'Open')),
    ];
});
