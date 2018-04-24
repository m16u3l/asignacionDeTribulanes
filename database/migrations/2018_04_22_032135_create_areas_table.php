<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{

    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
          $table->increments('id');
          $table->string('area_name', 60);
          $table->rememberToken();
          $table->timestamps();

          $table->integer('area_id')->nullable()->unsigned();
          $table->foreign('area_id')->references('id')->on('areas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('areas');
    }
}
