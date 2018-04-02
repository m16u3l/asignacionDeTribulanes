<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
  protected $table = "areas";
  protected $filleable = ['name', 'area_id'];
}
