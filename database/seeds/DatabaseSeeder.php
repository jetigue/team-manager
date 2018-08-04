<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AthletesTableSeeder::class);

        $this->call(GendersTableSeeder::class);

        $this->call(MeetHostsTableSeeder::class);

        $this->call(DivisionsTableSeeder::class);

        $this->call(TimingMethodsTableSeeder::class);

        $this->call(TrackMeetNamesTableSeeder::class);

        $this->call(CrossCountryMeetNamesTableSeeder::class);

        $this->call(CrossCountryVenuesTableSeeder::class);

        $this->call(RunEffortsTableSeeder::class);

        $this->call(RunFeelingsTableSeeder::class);

        $this->call(RunTypesTableSeeder::class);

        $this->call(DayTimesTableSeeder::class);

        $this->call(SeasonsTableSeeder::class);

        $this->call(TerrainTypesTableSeeder::class);

        // $this->call(TrackEventsTableSeeder::class);

        $this->call(TrackVenuesTableSeeder::class);

        $this->call(TrackSeasonsTableSeeder::class);

        $this->call(TrackMeetsTableSeeder::class);

        $this->call(CrossCountryMeetsTableSeeder::class);

        $this->call(TrackTeamResultsTableSeeder::class);

        $this->call(DistancesTableSeeder::class);

        // $this->call(TrackIndividualResultsTableSeeder::class);

        // $this->call(UserRolesTableSeeder::class);

        // $this->call(UsersTableSeeder::class);


    }
}
