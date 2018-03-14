<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Meets\Timing::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement($array = array ('Handheld', 'FAT')),
    ];
});
