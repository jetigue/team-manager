<?php

use Faker\Generator as Faker;

$factory->define(App\Models\TrackIndividualResult::class, function (Faker $faker) {
    return [
        'track_team_result_id' 	=> App\Models\TrackTeamResult::all()->random()->id,
        'track_event_id' 		=> App\Models\TrackEvent::all()->random()->id,
        'athlete_id'			=> App\Models\Athlete::all()->random()->id,
        'place'					=> $faker->numberBetween($min = 1, $max = 20),
        'total_seconds'			=> $faker->numberBetween($min = 240, $max = 480),
        'milliseconds'			=> $faker->numberBetween($min = 0, $max = 99), 
        'points'				=> $faker->numberBetween($min = 1, $max = 10),
    ];
});
