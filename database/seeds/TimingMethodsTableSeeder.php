<?php

use Illuminate\Database\Seeder;

class TimingMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\MeetProperties\Timing', 2)->create();
    }
}
