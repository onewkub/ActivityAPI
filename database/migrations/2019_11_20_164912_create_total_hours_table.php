<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotalHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('total_hours', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->integer('year')->unsigned()->primary();
            $table->integer('faculty')->unsigned();
            $table->integer('major')->unsigned();
            $table->integer('other')->unsigned();
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
        Schema::dropIfExists('total_hours');
    }
}
