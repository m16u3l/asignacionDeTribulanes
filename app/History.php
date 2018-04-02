<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
  protected $table = "history";
  protected $filleable = [
    'profile_id', 'professional_id', 'assigned'
  ];
}
