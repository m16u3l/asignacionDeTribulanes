<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modality extends Model
{
  protected $table = "modalities";
  protected $fillable = [
    'name', 'description'
  ];
  public function profiles()
  {
    return $this->hasMany('App\Profile');
  }
}
