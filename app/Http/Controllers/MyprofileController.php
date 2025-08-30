<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seo;
use App\Models\Contact;
use App\Models\CourseBooking;
use App\Models\Courses;
use App\Models\Page;


class MyprofileController extends Controller
{
    public function index()
{
    $data['page_seo'] = Seo::find(1);
    $data['contact'] = Contact::find(1);

    $userId = session('user_id');

    if (!$userId) {
        return redirect()->route('login')->with('error', 'Please log in first.');
    }

    $course_booking = CourseBooking::where('id', $userId)->with('course')->first();

    
    // print_r($course_booking->name);
    //  print_r($course_booking->email);
    //   print_r($course_booking->phone);
    //    print_r($course_booking->message);
    // exit();

    if (!$course_booking) {
        return redirect()->route('login')->with('error', 'User not found.');
    }

    $data['course_booking'] = $course_booking;

    return view('myprofile', $data);
}

}