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
          $table->integer('codigo');
          $table->string('name', 100);
          $table->text('descripcion')->nullable();

          $table->integer('area_id')->nullable()->unsigned();
          $table->foreign('area_id')->references('id')->on('areas');

          $table->rememberToken();
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('areas');
    }
}
