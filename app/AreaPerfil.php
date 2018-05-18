<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubArea extends Model
{
  protected $table = "area_perfiles";
  protected $fillable = [
    'area_id', 'profile_id'
  ];
}
