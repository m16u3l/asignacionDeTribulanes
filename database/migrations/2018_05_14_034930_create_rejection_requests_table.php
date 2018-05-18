<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRejectionRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rejection_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->integer('professional_id');
            $table->integer('profile_id');
            $table->integer('career_director_id');
            $table->date('date')->nullable();

            $table->foreign('professional_id')->references('id')->on('professionals');
            $table->foreign('profile_id')->references('id')->on('profiles');
            $table->foreign('career_director_id')->references('id')->on('career_directors');

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
        Schema::dropIfExists('rejection_requests');
    }
}
