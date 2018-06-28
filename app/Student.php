<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  protected $table = "students";
  protected $fillable = [
    'name', 'last_name_mother', 'last_name_father',
    'career'
  ];
  public function profiles()
  {
    return $this->belongsToMany('App\Profile','student_profiles');
  }
}
