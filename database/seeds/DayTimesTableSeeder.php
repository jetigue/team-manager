<?php

use Illuminate\Database\Seeder;

class DayTimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\TrainingProperties\Time', 4)->create();
    }
}
