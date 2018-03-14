<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Meets\Track\Season::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement($array = array (
        	'Outdoor Track', 
        	'Indoor Track',
        )),
    ];
});
