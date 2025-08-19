<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    //
    protected $fillable = ['title','content','image','slug','meta_title','meta_desc','meta_key'];
}
