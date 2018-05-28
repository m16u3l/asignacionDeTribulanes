<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeLetter extends Model
{
  protected $table = "type_letters";
  protected $fillable = [
    'name'
  ];

  public function profiles()
  {
    return $this->belongsToMany('App\Profile','letters');
  }
}
