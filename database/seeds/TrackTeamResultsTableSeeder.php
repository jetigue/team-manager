<?php

use Illuminate\Database\Seeder;

class TrackTeamResultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Track\Results\Team\Result', 25)->create();
    }
}
