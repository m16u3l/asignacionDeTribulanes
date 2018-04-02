<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaInterest extends Model
{
  protected $table = "areas_interest";
  protected $filleable = [
    'area_id', 'professional_id'
  ];
}
