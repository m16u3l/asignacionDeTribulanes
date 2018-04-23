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
          $table->string('cod_sis')->default("000000");
          $table->string('ci')->default("00000");
          $table->string('degree');
          $table->string('professional_name');
          $table->string('professional_last_name_mother');
          $table->string('professional_last_name_father');
          $table->string('workload');
          $table->string('phone');
          $table->string('address');
          $table->string('email');
          $table->string('image')->nullable();
          $table->string('profile')->nullable();

          $table->integer('count')->default(0);

          $table->rememberToken();
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('professionals');
    }
}
