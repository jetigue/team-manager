<?php

use Faker\Generator as Faker;

$factory->define(App\Models\GeneralProperties\Terrain::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement($array = array (
            'Ashpalt', 'Concrete', 'Grass', 'Rubber Track', 'Crushed gravel'
        )),
        'description' => $faker->sentence($nbWords = 15, $variableNbWords = true),
    ];
});
