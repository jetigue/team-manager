<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Track\Venue::class, function (Faker $faker) {
    return [
        'name'	=>	$faker->lastName . " " . 'Stadium',
        'city'  =>	$faker->city,
        'state'	=>	$faker->stateAbbr,
    ];
});
