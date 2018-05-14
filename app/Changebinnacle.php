<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChangeBinnacle extends Model
{
  protected $table = "change_binnacles";
  protected $fillable = [
    'description', 'professional_id', 'profile_id', 'type_change_id'
  ];
}
