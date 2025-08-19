<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Nutritionuser extends Authenticatable
{
    use Notifiable;

    // Define the table if it's not `nutritionusers`
    protected $table = 'usernews';

    protected $fillable = [
        'name', 'username', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
