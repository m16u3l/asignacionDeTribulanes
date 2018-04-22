<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
  protected $table = "professionals";
  protected $fillable = [
    'cod_sis', 'ci', 'degree', 'name', 'last_name_mother', 'last_name_father',
    'workload', 'phone', 'address', 'email', 'image', 'profile', 'count'
  ];

  public function assingements()
  {
    return $this->hasMany('App\Assignement');
  }

  public function interests()
  {
    return $this->hasMany('App\AreaInterest');
  }

  public function profiles()
  {
    return $this->hasMany('App\Tutor');
  }
}
