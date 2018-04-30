<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
  protected $table = "professionals";
  protected $fillable = [
    'cod_sis',
    'ci',
    'degree',
    'professional_name',
    'professional_last_name_mother',
    'professional_last_name_father',
    'workload',
    'phone',
    'address',
    'email',
    'image',
    'profile',
    'count'
  ];

  public function profiles_signed()
  {
    return $this->belongsToMany('App\Profile','assignements');
  }

  public function interests()
  {
    return $this->belongsToMany('App\Area','area_interests');
  }

  public function profiles_tutors()
  {
    return $this->belongsToMany('App\Profile','tutors');
  }
}
