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

  /**
   *  buscar profesionales por nombre
   */
  public function scopeSearch_by_name($query, $name)
  {
    $query -> where(\DB::raw("concat(professional_name, ' ', professional_last_name_father, ' ',
      professional_last_name_mother)"), 'ilike','%'.$name.'%');
  }

  public function assingements()
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
