<?php

use Illuminate\Database\Seeder;

class CrossCountryVenuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\CrossCountry\Venue', 10)->create();
    }
}
