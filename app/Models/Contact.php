<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable = ['address','address2', 'phone', 'phone2','location','email','email2','whatsapp','facebook','twitter','instagram','youtube','linkedin'];
}
