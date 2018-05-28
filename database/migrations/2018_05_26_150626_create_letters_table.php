<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letters', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('profile_id');
            $table->integer('professional_id')->nullable();
            $table->integer('type_letter_id');
            $table->boolean('letter')->default(false);

            $table->foreign('type_letter_id')->references('id')->on('type_letters');
            $table->foreign('profile_id')->references('id')->on('profiles');
            $table->foreign('professional_id')->references('id')->on('professionals');
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
        Schema::dropIfExists('letters');
    }
}
