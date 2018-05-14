<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaInterestsTable extends Migration
{

  public function up()
  {
    Schema::create('area_interests', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('area_id');
      $table->integer('professional_id');

      $table->foreign('area_id')->references('id')->on('areas');
      $table->foreign('professional_id')->references('id')->on('professionals');

      $table->rememberToken();
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('area_interests');
  }
}
