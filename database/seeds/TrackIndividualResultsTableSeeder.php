<?php

use Illuminate\Database\Seeder;

class TrackIndividualResultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\TrackIndividualResult', 100)->create();
    }
}
