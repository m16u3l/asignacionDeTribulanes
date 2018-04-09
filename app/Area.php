<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
  protected $table = "areas";
  protected $fillable = ['name', 'area_id'];

  
  public function profiles()
  {
    return $this->hasMany('App\Profile');
  }

  public function areas_interests()
  {
    return $this->hasMany('App\AreaInterest');
  }
  
}
