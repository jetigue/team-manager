<?php

use Faker\Generator as Faker;

$factory->define(App\Models\GeneralProperties\Season::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement($array = array ('Cross Country', 'Outdoor Track', 'Indoor Track', 'Summer', 'Winter'))
    ];
});
