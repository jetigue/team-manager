<?php

use Illuminate\Database\Seeder;

class TrackSeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Meets\Track\Season', 2)->create();
    }
}
