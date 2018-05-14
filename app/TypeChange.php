<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_Change extends Model
{
  protected $table = "type_changes";
  protected $fillable = [
    'name'
  ];

  public function profiles()
  {
    return $this->belongsToMany('App\Profile','change_binnacles');
  }

  public function professionals()
  {
    return $this->belongsToMany('App\Professional','change_binnacles');
  }
}
