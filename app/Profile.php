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
  public function scopeBuscarPorTituloOEstudiante($query, $name)
  {
    $query -> where('degree', 'ilike','%'.$name.'%')
      ->orWhere(\DB::raw("concat(applicant_name, ' ', applicant_last_name_father, ' ',
      applicant_last_name_mother)"), 'ilike','%'.$name.'%');
  }

  public function area()
  {
    return $this->belongsTo('App\Area');
  }

  public function assingements()
  {
    return $this->hasMany('App\Assignement');
  }

  public function tutors()
  {
    return $this->hasMany('App\Tutor');
  }

  public function students()
  {
    return $this->hasMany('App\StudentProfile');
  }

}
