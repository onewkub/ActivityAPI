<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsRequiredsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('is_requireds', function (Blueprint $table) {
            // $table->increments('id');
            $table->integer('aid')->unsigned();
            $table->integer('year')->unsigned();
            $table->foreign('aid', 'year')->references('actID', 'actYear')->on('activities');
            // $table->dropPrimary('is_requireds_id_primary');

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
        Schema::dropIfExists('is_requireds');
    }
}
