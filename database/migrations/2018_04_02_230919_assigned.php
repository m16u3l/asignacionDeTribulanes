<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Assigned extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('assignements', function (Blueprint $table){
      $table->increments('id');
      $table->integer('profile_id');
      $table->integer('professional_id');
      $table->dateTime('assigned');

      $table->rememberToken();
      $table->timestamps();

      $table->foreign('profile_id')->references('id')->on('profiles');
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
