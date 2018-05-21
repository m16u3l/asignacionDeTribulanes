<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{

  public function up()
  {
    Schema::create('profiles', function (Blueprint $table) {

      $table->increments('id');
      $table->string('title');
      $table->text('objective')->nullable();
      $table->boolean('letter_teacher')->default(false);
      $table->boolean('leatter_modality')->default(false);
      $table->integer('state_id');
      $table->integer('modality_id');
      $table->integer('academic_term_id')->nullable();

      // internal Control
      $table->integer('count')->default(0);
      $table->foreign('state_id')->references('id')->on('states');
      $table->foreign('modality_id')->references('id')->on('modalities');
      $table->foreign('academic_term_id')->references('id')->on('academic_terms');

      $table->rememberToken();
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('profiles');
  }
}
