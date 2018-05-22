<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorsTable extends Migration
{
  public function up()
  {
    Schema::create('tutors', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('profile_id');
      $table->integer('professional_id');

      $table->boolean('letter')->default(false);

      $table->foreign('profile_id')->references('id')->on('profiles');
      $table->foreign('professional_id')->references('id')->on('professionals');

      $table->rememberToken();
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('tutors');
  }
}
