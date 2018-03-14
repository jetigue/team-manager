<?php

use Illuminate\Database\Seeder;

class TrackMeetNamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Meets\Track\Name', 10)->create();
    }
}
