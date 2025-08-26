<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seo;
use App\Models\Contact;
use App\Models\Banner;
use App\Models\CourseBooking;
use App\Models\Courses;
use App\Models\Page;
use Illuminate\Support\Facades\DB;


class MyaccountController extends Controller
{
     public function index()
    {

        $data['page_seo'] = Seo::find(1);
        $data['contact'] = Contact::find(1);
        $data['courses'] = DB::table('course_bookings')
        ->join('coursesnews', 'course_bookings.course_id', '=', 'coursesnews.id')
        ->where('course_bookings.user_id', auth()->id())
        //->select('coursesnews.*', 'course_bookings.status', 'course_bookings.created_at as purchased_at')
        ->select('coursesnews.*','course_bookings.activation_date','course_bookings.ending_date','course_bookings.status','course_bookings.created_at as purchased_at')
        ->get(); 

        return view('my-account', $data);
    }
}