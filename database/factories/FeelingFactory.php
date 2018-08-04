<?php

use Faker\Generator as Faker;

$factory->define(App\Models\TrainingProperties\Feeling::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement($array = array (
            'Great', 'Good', 'Okay', 'Bad', 'Awful'
        )),
        'description' => $faker->sentence($nbWords = 15, $variableNbWords = true),
    ];
});
