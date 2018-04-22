<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  protected $table = "students";
  protected $fillable = [
    'student_name', 'student_last_name_mother', 'student_last_name_father',
    'career'
  ];
  public function profiles()
  {
    return $this->hasMany('App\StudentProfile');
  }
}
