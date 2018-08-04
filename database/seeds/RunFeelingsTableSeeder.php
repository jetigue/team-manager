<?php

use Illuminate\Database\Seeder;

class RunFeelingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\TrainingProperties\Feeling', 4)->create();
    }
}
