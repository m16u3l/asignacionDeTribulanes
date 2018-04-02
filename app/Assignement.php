<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignement extends Model
{
  protected $table = "assignements";
  protected $filleable = [
    'profile_id', 'professional_id', 'assigned'
  ];
    
}
