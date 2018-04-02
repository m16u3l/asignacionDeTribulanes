<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Profiles extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('profiles', function( Blueprint $table){
      $table->increments('id');
      $table->string('title', 60);
      $table->string('tutor_name', 60);
      $table->string('tutor_last_name_mother', 60);
      $table->string('tutor_last_name_father', 60);
      $table->string('applicant_name', 60);
      $table->string('applicant_last_name_mother', 60);
      $table->string('applicant_last_name_father', 60);
      $table->string('objective', 60);
      $table->string('title_modality', 60);

      $table->rememberToken();
      $table->timestamps();

      // internal Control
      $table->integer('count');
      $table->boolean('assigned');
      $table->boolean('finalized');
      $table->boolean('sent');
      $table->boolean('profile_state');

      $table->integer('area_id')->unsigned();

      $table->foreign('area_id')->references('id')->on('areas');


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
