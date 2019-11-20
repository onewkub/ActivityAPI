<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->integer('actYear')->unsigned();
            $table->integer('actID')->unsigned();
            $table->string('actName');
            $table->dateTime('actDate');
            $table->unsignedInteger('hour');
            $table->text('detail');
            $table->string('type');
            $table->primary(['actID', 'actYear']);

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
        Schema::dropIfExists('activities');
    }
}
