<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
  protected $table = "dates";
  protected $fillable = [
    'initiated', 'approved', 'assigned', 'finalized',
    'defended', 'abandoned', 'profile_id'
  ];
  public function profile()
  {
    return $this->belongsTo('App\Profile');
  }
}
