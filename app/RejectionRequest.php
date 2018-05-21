<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RejectionRequest extends Model
{
  protected $table = "rejection_requests";
  protected $fillable = [
    'description',
    'professional_id',
    'profile_id',
    'career_director_id',
    'date'
  ];

}
