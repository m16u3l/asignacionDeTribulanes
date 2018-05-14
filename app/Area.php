<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
  protected $table = "areas";
  protected $fillable = ['name',
                         'codigo',
                         'descripcion',
                         'area_id'];

  public function professionals()
  {
    return $this->belongsToMany('App\Professional','area_interests');
  }

  public function sub_areas()
  {
    return $this->hasMany('App\Area');
  }

  public function profiles()
  {
    return $this->belongsToMany('App\Profile','sub_areas');
  }
}
