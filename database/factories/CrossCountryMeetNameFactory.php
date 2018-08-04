<?php

use Faker\Generator as Faker;

$factory->define(App\Models\CrossCountry\Name::class, function (Faker $faker) {
    return [
        'name'	=>	 'The' . " " .$faker->lastName . " " . $faker->firstName . " " . 'Cross Country Invitational',
    ];
});
