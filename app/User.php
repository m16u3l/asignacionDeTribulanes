<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'account_name', 'password', 'password_repeat',
    ];


    protected $hidden = [
        'password','password_repeat', 'remember_token',
    ];
}
