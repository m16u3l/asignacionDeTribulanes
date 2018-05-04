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
      $table->date('finalized_date')->nullable();
      $table->integer('period')->default(1);
      $table->string('degree_modality', 60)->nullable(true);

      $table->rememberToken();
      $table->timestamps();

      // internal Control
      $table->integer('count')->default(0);
      $table->boolean('profile_state')->default(false);
      $table->boolean('profile_finalized')->default(false);
      $table->boolean('profile_sended')->default(false);
      $table->boolean('profile_assigened')->default(false);

      $table->boolean('letter_professional')->default(false);

      $table->integer('area_id')->nullable()->unsigned();
      $table->foreign('area_id')->references('id')->on('areas');
    });
  }

  public function down()
  {
    Schema::dropIfExists('profiles');
  }
}
