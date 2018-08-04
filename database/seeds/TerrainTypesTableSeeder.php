<?php

use Illuminate\Database\Seeder;

class TerrainTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\GeneralProperties\Terrain', 5)->create();
    }
}
