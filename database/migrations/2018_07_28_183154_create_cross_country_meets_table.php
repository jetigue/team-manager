<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrossCountryMeetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cross_country_meets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cross_country_meet_name_id');
            $table->date('meet_date');
            $table->unsignedSmallInteger('cross_country_venue_id');
            $table->unsignedSmallInteger('host_id');
            $table->unsignedTinyInteger('timing_method_id');
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
        Schema::dropIfExists('cross_country_meets');
    }
}
