<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Track\Meet::class, function (Faker $faker) {
    return [
      'track_meet_name_id'	=> App\Models\Track\Name::all()->random()->id,
      'meet_date' 		 	=> $faker->date($format = 'Y-m-d'),
      'track_venue_id'	 	=> App\Models\Track\Venue::all()->random()->id,
      'host_id'				=> App\Models\MeetProperties\Host::all()->random()->id,
      'track_season_id'		=> App\Models\Track\Season::all()->random()->id,
      'timing_method_id'	=> App\Models\MeetProperties\Timing::all()->random()->id,
    ];
});
