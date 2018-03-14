<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackTeamResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('track_team_results', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('track_meet_id');
            $table->unsignedTinyInteger('division_id');
            $table->unsignedTinyInteger('gender_id');
            $table->unsignedSmallInteger('place')->nullable();
            $table->unsignedSmallInteger('number_teams');
            $table->unsignedSmallInteger('points')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('track_team_results');
    }
}
