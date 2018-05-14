<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChangeBinnaclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('change_binnacles', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->integer('professional_id');
            $table->integer('profile_id');
            $table->integer('type_change_id');

            $table->foreign('professional_id')->references('id')->on('professionals');
            $table->foreign('profile_id')->references('id')->on('profiles');
            $table->foreign('type_change_id')->references('id')->on('type_changes');

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
        Schema::dropIfExists('change_binnacles');
    }
}
