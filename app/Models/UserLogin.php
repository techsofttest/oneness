<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLogin extends Model
{
    //
      protected $table = 'user_logins'; // or your actual table name

    protected $fillable = [
      'name',
        'email',
        'password',
        'user_agent',
        'ip_address',
    ];
}
