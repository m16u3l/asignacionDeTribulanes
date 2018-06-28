<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
  protected $table = "student_profiles";
  protected $fillable = [
    'student_id', 'profile_id'
  ];

}
