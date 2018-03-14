<?php

use Illuminate\Database\Seeder;

class MeetHostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Meets\Host', 10)->create();
    }
}
