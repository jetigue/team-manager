<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Meets\Gender::class, function (Faker $faker) {
    return [
         'name' => $faker->unique()->randomElement($array = array ('Boys', 'Girls', 'Mixed')),

    ];
});
