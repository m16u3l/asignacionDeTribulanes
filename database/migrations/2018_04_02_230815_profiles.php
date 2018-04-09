<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Profiles extends Migration
{
  public function up()
  {
    Schema::create('profiles', function( Blueprint $table){
      $table->increments('id');
      $table->string('title', 200);
      $table->string('tutor_name', 60);
      $table->string('tutor_last_name_mother', 60);
      $table->string('tutor_last_name_father', 60);
      $table->string('applicant_name', 60);
      $table->string('applicant_last_name_mother', 60);
      $table->string('applicant_last_name_father', 60);
      $table->string('objective', 60)->nullable();
      $table->string('career', 60)->nullable();
      $table->date('registration_date');
      $table->integer('period')->default(1);
      $table->string('title_modality', 60)->nullable();            

      $table->rememberToken();
      $table->timestamps();

      // internal Control
      $table->integer('count')->default(0);
      $table->boolean('assigned')->default(false);
      $table->boolean('finalized')->default(false);
      $table->boolean('sent')->default(false);
      $table->boolean('profile_state')->default(false);

      $table->integer('area_id')->nullable()->unsigned();

      $table->foreign('area_id')->references('id')->on('areas');


    });
  }

  public function down()
  {
    Schema::drop('profiles');
  }
}
