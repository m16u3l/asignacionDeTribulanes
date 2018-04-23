<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
  protected $table = "history";
  protected $filleable = [
    "profile_id", "professional_id", "assigned"
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
