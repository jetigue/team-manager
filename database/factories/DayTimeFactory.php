<?php

use Faker\Generator as Faker;

$factory->define(App\Models\TrainingProperties\Time::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement($array = array (
            'Early Morning', 'Late Morning', 'Noon', 'Early Afternoon', 'Late Afternoon', 'Evening'
        )),
        'description' => $faker->sentence($nbWords = 15, $variableNbWords = true),
    ];
});
