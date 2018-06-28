<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
  protected $table = "courts";
  protected $fillable = [
    'profile_id', 'professional_id', 'assigned'
  ];

}
