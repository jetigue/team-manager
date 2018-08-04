<?php

use Faker\Generator as Faker;

$factory->define(App\Models\CrossCountry\Venue::class, function (Faker $faker) {
    return [
            'name'	=>	$faker->lastName . " " . 'College',
            'city'  =>	$faker->city,
            'state'	=>	$faker->stateAbbr,
    ];
});
