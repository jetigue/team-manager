<?php

use Illuminate\Database\Seeder;

class CrossCountryMeetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\CrossCountry\Meet', 10)->create();
    }
}
