<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
  protected $table = "professionals";
  protected $filleable = [
    'cod_sis', 'ci', 'title', 'name', 'last_name_mother', 'last_name_father', 'workload',
    'phone', 'address', 'email', 'image', 'account_name', 'password', 'password_repeat','profile',
    'count'
  ];
}
