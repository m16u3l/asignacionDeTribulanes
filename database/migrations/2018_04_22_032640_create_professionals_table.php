<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionalsTable extends Migration
{
    public function up()
    {
        Schema::create('professionals', function (Blueprint $table) {
          $table->increments('id');
          $table->string('cod_sis')->default("000000")->nullable();
          $table->string('ci')->default("00000")->nullable();
          $table->string('name');
          $table->string('last_name_mother');
          $table->string('last_name_father');
          $table->string('workload');
          $table->integer('count')->default(0);
          $table->integer('degree_id');

          $table->foreign('degree_id')->references('id')->on('degrees');

          $table->rememberToken();
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('professionals');
    }
}
