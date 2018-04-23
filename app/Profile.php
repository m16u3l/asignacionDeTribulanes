<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  protected $table = "profiles";
  protected $fillable = [
    'title', 'objective', 'registration_date', 'period', 'degree_modality', 'count',
    'profile_state', 'area_id'
  ];


  public function area()
  {
    return $this->belongsTo('App\Area');
  }

  public function assingements()
  {
    return $this->hasMany('App\Assignement');
  }

  public function tutors()
  {
    return $this->hasMany('App\Tutor');
  }

  public function students()
  {
    return $this->hasMany('App\StudentProfile');
  }

}
