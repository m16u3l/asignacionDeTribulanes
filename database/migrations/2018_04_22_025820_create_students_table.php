<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
  public function up()
  {
    Schema::create('students', function (Blueprint $table) {
        $table->increments('id');
        $table->string('student_name');
        $table->string('student_last_name_mother')->nullable();
        $table->string('student_last_name_father');
        $table->string('career', 60)->nullable();

        $table->rememberToken();
        $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('students');
  }
}
