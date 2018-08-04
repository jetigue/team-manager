<?php

use Illuminate\Database\Seeder;

class CrossCountryMeetNamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\CrossCountry\Name', 10)->create();
    }
}
