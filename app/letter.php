<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
  protected $table = "letters";
  protected $fillable = [
    'profile_id', 'professional_id','letter', 'type_letter_id'
  ];
  
}
