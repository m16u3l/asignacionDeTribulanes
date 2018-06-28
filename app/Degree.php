<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class degree extends Model
{
  protected $table = "degrees";
  protected $fillable = [
    'acronym'
  ];
  public function professionals()
  {
    return $this->hasMany('App\Professional');
  }
}
