<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coursesnew extends Model
{
    protected $fillable = ['title', 'description', 'duration','image','video_embed','access_start','access_end','fees','slug','meta_title','meta_desc','meta_key'];
    protected $casts = [
    'video' => 'array',
    ];
}
