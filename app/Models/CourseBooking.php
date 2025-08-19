<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseBooking extends Model
{
    //
    protected $fillable = [
     'course_id', 'name', 'email', 'phone', 'message', 'slip'
];

public function course()
{
    return $this->belongsTo(Coursesnew::class, 'course_id');
}

 public function user()
{
        return $this->belongsTo(User::class);
}

}
