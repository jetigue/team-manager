<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Meets\Track\Meet::class, function (Faker $faker) {
    return [
      'track_meet_name_id'	=> App\Models\Meets\Track\Name::all()->random()->id,
      'meet_date' 		 	=> $faker->date($format = 'Y-m-d'),
      'track_venue_id'	 	=> App\Models\Meets\Track\Venue::all()->random()->id,
      'host_id'				=> App\Models\Meets\Host::all()->random()->id,
      'track_season_id'		=> App\Models\Meets\Track\Season::all()->random()->id,
      'timing_method_id'	=> App\Models\Meets\Timing::all()->random()->id,
    ];
});
