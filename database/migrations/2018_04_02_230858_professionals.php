<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Professionals extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('professionals', function (Blueprint $table){
      $table->increments('id');
      $table->string('cod_sis');
      $table->string('ci');
      $table->string('title');
      $table->string('name');
      $table->string('last_name_mother');
      $table->string('last_name_father');
      $table->string('workload');
      $table->string('phone');
      $table->string('address');
      $table->string('email');
      $table->string('image');

      // Data account
      $table->string('account_name');
      $table->string('password');
      $table->string('password_repeat');
      $table->string('profile');

      $table->integer('count');

      $table->rememberToken();
      $table->timestamps();
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
