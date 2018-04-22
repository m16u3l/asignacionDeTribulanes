<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
  protected $table = "student_profiles";
  protected $fillable = [
    'student_id', 'profile_id'
  ];
  public function profile()
  {
    return $this->belongsTo('App\Profile');
  }

  public function student()
  {
    return $this->belongsTo('App\Student');
  }
}
