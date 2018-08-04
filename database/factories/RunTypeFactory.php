<?php

use Faker\Generator as Faker;

$factory->define(App\Models\TrainingProperties\Type::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement($array = array (
            'Easy Run', 'Tempo Run', 'Intervals', 'Hill Repeats', 'Fartlek'
        )),
        'description' => $faker->sentence($nbWords = 15, $variableNbWords = true),
    ];
});
