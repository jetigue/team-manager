<?php

use Faker\Generator as Faker;

$factory->define(App\Models\CrossCountry\Meet::class, function (Faker $faker) {
    return [
        'cross_country_meet_name_id' => App\Models\CrossCountry\Name::all()->random()->id,
        'meet_date'                  => $faker->date($format = 'Y-m-d'),
        'cross_country_venue_id'     => App\Models\CrossCountry\Venue::all()->random()->id,
        'host_id'                    => App\Models\MeetProperties\Host::all()->random()->id,
        'timing_method_id'           => App\Models\MeetProperties\Timing::all()->random()->id,
    ];
});
