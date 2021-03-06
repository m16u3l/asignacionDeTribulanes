<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
  protected $table = "professionals";
  protected $fillable = [
    'cod_sis', 'ci', 'degree', 'name', 'last_name_mother', 'last_name_father', 'workload',
    'phone', 'address', 'email', 'image', 'account_name', 'password', 'password_repeat','profile',
    'count'
  ];

  public function assingements()
  {
    return $this->hasMany('App\Assignement');
  }

  public function historys()
  {
    return $this->hasMany('App\History');
  }

  public function interests()
  {
    return $this->hasMany('App\AreaInterest');
  }

}
