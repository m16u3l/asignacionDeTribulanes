<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaInterest extends Model
{
  protected $table = "areas_interest";
  protected $fillable = [
    'area_id', 'professional_id'
  ];

  public function professional()
  {
    return $this->belongsTo('App\Professional');
  }

  public function area()
  {
    return $this->belongsTo('App\Area');
  }  
}
