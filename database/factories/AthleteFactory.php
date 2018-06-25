<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Athlete::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name'  => $faker->lastName,
        'sex'        => $faker->randomElement($array = array('m', 'f')),
        'grad_year'  => $faker->randomElement($array = array(2016, 2017, 2018, 2019, 2020, 2021)),
        'dob'        => $faker->date($format = 'Y-m-d', $max = '2004-01-01'),
        'status'     => $faker->randomElement($array = array('a', 'i')),
    ];
});
