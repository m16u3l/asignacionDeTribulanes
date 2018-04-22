<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  protected $table = "profiles";
  protected $fillable = [
    'degree','tutor_name', 'tutor_last_name_mother', 'tutor_last_name_father',
    'applicant_name', 'applicant_last_name_mother', 'applicant_last_name_father',
    'objective', 'degree_modality', 'count', 'assigned', 'finalized', 'sent', 'profile_state',
    'area_id'
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

  public function historys()
  {
    return $this->hasMany('App\History');
  }
  
}
