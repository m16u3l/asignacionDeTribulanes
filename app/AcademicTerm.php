<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicTerm extends Model
{
  protected $table = "academic_term";
  protected $fillable = [
    'date_ini', 'date_fin', 'period'
  ];
  public function profiles()
  {
    return $this->hasMany('App\Profile');
  }
}
