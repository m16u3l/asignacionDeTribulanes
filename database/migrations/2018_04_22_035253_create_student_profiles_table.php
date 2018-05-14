<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentProfilesTable extends Migration
{
  public function up()
  {
    Schema::create('student_profiles', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('student_id');
      $table->integer('profile_id');

      $table->foreign('student_id')->references('id')->on('students');
      $table->foreign('profile_id')->references('id')->on('profiles');

      $table->rememberToken();
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('student_profiles');
  }
}
