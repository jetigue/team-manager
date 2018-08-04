<?php

use Faker\Generator as Faker;

$factory->define(App\Models\GeneralProperties\Distance::class, function (Faker $faker) {
    return [
        'name' => '2 Mile',
        'meters' => 3218
    ];
});
