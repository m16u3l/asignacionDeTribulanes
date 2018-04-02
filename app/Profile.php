<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  protected $table = "profiles";
  protected $filleable = [
    'title','tutor_name', 'tutor_last_name_mother', 'tutor_last_name_father',
    'applicant_name', 'applicant_last_name_mother', 'applicant_last_name_father',
    'objective', 'title_modality', 'count', 'assigned', 'finalized', 'sent', 'profile_state',
    'area_id'
  ];
}
