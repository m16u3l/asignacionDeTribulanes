<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
  protected $table = "professionals";
  protected $fillable = [
    'cod_sis',
    'ci',
    'name',
    'last_name_mother',
    'last_name_father',
    'workload',
    'count',
    'degree_id'
  ];

  /**
   *  buscar profesionales por nombre
   */
  public function scopeSearch_by_name($query, $name)
  {
    $query -> where(\DB::raw("concat(name, ' ', last_name_father, ' ',
      last_name_mother)"), 'ilike','%'.$name.'%');
  }

  public function degree()
  {
    return $this->belongsTo('App\Degree');
  }
  public function contact()
  {
    return $this->hasOne('App\Contact');
  }
  public function profiles_courts()
  {
    return $this->belongsToMany('App\Profile','courts');
  }

  public function interests()
  {
    return $this->belongsToMany('App\Area','area_interests');
  }

  public function profiles_tutors()
  {
    return $this->belongsToMany('App\Profile','tutors');
  }

  public function type_changes()
  {
    return $this->belongsToMany('App\TypeChange','change_binnacles');
  }

  public function change_profiles()
  {
    return $this->belongsToMany('App\Profile','rejection_requests');
  }
}
