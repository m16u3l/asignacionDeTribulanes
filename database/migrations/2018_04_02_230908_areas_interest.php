<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AreasInterest extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('areas_interest', function (Blueprint $table){
      $table->increments('id');
      $table->integer('area_id');
      $table->integer('professional_id');

      $table->rememberToken();
      $table->timestamps();

      $table->foreign('area_id')->references('id')->on('areas');
      $table->foreign('professional_id')->references('id')->on('professionals');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    //
  }
}
