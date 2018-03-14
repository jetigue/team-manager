<?php

use Illuminate\Database\Seeder;

class TrackVenuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Meets\Track\Venue', 10)->create();
    }
}
