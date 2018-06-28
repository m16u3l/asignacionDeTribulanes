<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaInterest extends Model
{
  protected $table = "area_interests";
  protected $fillable = [
    'area_id', 'professional_id'
  ];

}
