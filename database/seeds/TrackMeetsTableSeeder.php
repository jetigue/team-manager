<?php

use Illuminate\Database\Seeder;

class TrackMeetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Meets\Track\Meet', 10)->create();
    }
}
