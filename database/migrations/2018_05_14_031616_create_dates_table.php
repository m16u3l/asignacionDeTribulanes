<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dates', function (Blueprint $table) {
            $table->increments('id');
            $table->date('initiated')->nullable();
            $table->date('approved')->nullable();
            $table->date('assigned')->nullable();
            $table->date('finalized')->nullable();
            $table->date('defended')->nullable();
            $table->date('abandoned')->nullable();
            $table->integer('profile_id');

            $table->foreign('profile_id')->references('id')->on('profiles');

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
        Schema::dropIfExists('dates');
    }
}
