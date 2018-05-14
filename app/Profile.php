<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  protected $table = "profiles";
  protected $fillable = [
    'title', 'objective', 'count', 'letter' ,
    'state_id', 'modality_id', 'academic_term_id'
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

  public function academic_term()
  {
    return $this->belongsTo('App\AcademicTerm');
  }

  public function modality()
  {
    return $this->belongsTo('App\Modality');
  }

  public function state()
  {
    return $this->belongsTo('App\State');
  }

  public function date()
  {
    return $this->hasMany('App\Date');
  }

  public function areas()
  {
    return $this->belongsToMany('App\Area','sub_areas');
  }

  public function courts()
  {
    return $this->belongsToMany('App\Professional','courts');
  }

  public function tutors()
  {
    return $this->belongsToMany('App\Professional','tutors');
  }

  public function students()
  {
    return $this->belongsToMany('App\Student','student_profiles');
  }

  public function type_changes()
  {
    return $this->belongsToMany('App\TypeChange','change_binnacles');
  }

  public function change_courts()
  {
    return $this->belongsToMany('App\Professional','change_binnacles');
  }

}
