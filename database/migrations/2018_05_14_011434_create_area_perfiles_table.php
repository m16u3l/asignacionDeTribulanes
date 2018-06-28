<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaPerfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_perfiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('area_id');
            $table->integer('profile_id');

            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('profile_id')->references('id')->on('profiles');

            $table->rememberToken();
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
        Schema::dropIfExists('area_perfiles');
    }
}
