<?php

use Faker\Generator as Faker;

$factory->define(App\Models\RaceProperties\Gender::class, function (Faker $faker) {
    return [
         'name' => $faker->unique()->randomElement($array = array ('Boys', 'Girls', 'Mixed')),

    ];
});
