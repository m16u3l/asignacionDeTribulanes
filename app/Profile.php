<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  protected $table = "profiles";
  protected $fillable = [
    'title', 'objective', 'finalized_date', 'period', 'degree_modality', 'count',
    'profile_state', 'profile_state', 'profile_finalized',
    'profile_sended', 'profile_assigened', 'letter_professional' , 'area_id'
  ];
  /*
  +    consulta para buscar perfiles por Titulo de perfil
  +    y tambien por nombre de Estudiante no sensibles a mayusculas y minusculas
  +  */
  public function scopeSearch_by_title_or_student($query, $name='')
  {
    if (trim($name) != '') {
           $this->_searchName = $name;
           $query -> where('title', 'ilike',"%$name%")
               ->orWhereHas('students', function($query){
                    $name = $this->_searchName;
                  $query->where(\DB::raw("concat(student_name, ' ', student_last_name_father, ' ',
                  student_last_name_mother)"),'ilike',"%$name%");
               }
             );
       }
  }
  public function scopeLetters($query)
  {
    $query ->where('letter_professional', '=', 'true' )
           ->whereHas('mastutors', function($query){
             $query->where('letter','true' );
           }
         );
  }
  public function mastutors()
  {
    return $this->hasMany('App\Tutor');
  }

  public function area()
  {
    return $this->belongsTo('App\Area');
  }

  public function assingements()
  {
    return $this->belongsToMany('App\Professional','assignements');
  }

  public function tutors()
  {
    return $this->belongsToMany('App\Professional','tutors');
  }

  public function students()
  {
    return $this->belongsToMany('App\Student','student_profiles');
  }

}
