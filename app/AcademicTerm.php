<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicTerm extends Model
{
  protected $table = "academic_terms";
  protected $fillable = [
    'date_ini', 'date_fin', 'period'
  ];
  public function profiles()
  {
    return $this->hasMany('App\Profile');
  }
}
