<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('join_activities', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->integer('actYear')->unsigned();
            $table->integer('actID')->unsigned();
            $table->integer('stdID')->unsigned();
            $table->foreign('stdID')->references('studentID')->on('students');
            $table->foreign(['actID', 'actYear'])->references(['actID', 'actYear'])->on('activities');
            $table->primary(['actID', 'stdID']);
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
        Schema::dropIfExists('join_activities');
    }
}
