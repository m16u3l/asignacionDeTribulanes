<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignement extends Model
{
  protected $table = "assignements";
  protected $fillable = [
    'profile_id', 'professional_id', 'assigned'
  ];

  public function professional()
  {
    return $this->belongsTo('App\Professional');
  }

  public function profile()
  {
    return $this->belongsTo('App\Profile');
  }
}
