<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCareerDirectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_directors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('professional_id');
            $table->boolean('active')->default(true);
            $table->date('date_ini')->nullable();
            $table->date('date_fin')->nullable();
            $table->foreign('professional_id')->references('id')->on('professionals');

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
        Schema::dropIfExists('career_directors');
    }
}
