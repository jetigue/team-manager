<?php

use Faker\Generator as Faker;

$factory->define(App\Models\TrainingProperties\Effort::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement($array = array (
            'Hard', 'Relaxed', 'All-Out', 'Reserved', 'Medium'
        )),
        'description' => $faker->sentence($nbWords = 15, $variableNbWords = true),
    ];
});
