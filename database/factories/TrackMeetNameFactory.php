<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Meets\Track\Name::class, function (Faker $faker) {
    return [
        'meet_name'	=>	 'The' . " " .$faker->lastName . " " . $faker->firstName . " " . 'Invitational',
    ];
});
