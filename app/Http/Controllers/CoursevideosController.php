<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seo;
use App\Models\Contact;
use App\Models\Banner;
use App\Models\CourseBooking;
use App\Models\Coursesnew;
use App\Models\Page;

use Carbon\Carbon;

use Illuminate\Support\Facades\DB;


class CoursevideosController extends Controller
{
   public function index()
{

     $today = Carbon::today()->toDateString();

    // Fetch the user from the CourseBooking table

    // Proceed to load data for the course-videos page
    $data['page_seo'] = Seo::find(1);

    $data['contact'] = Contact::find(1);
    
    $data['home_about'] = Page::find(1);


    $data['courses'] = DB::table('course_bookings')
    ->join('coursesnews', 'course_bookings.course_id', '=', 'coursesnews.id')
    ->where('course_bookings.user_id', auth()->id())
    ->where('status','active')
    ->whereDate('course_bookings.activation_date', '<=', $today)
    ->whereDate('course_bookings.ending_date', '>=', $today)
    ->select('coursesnews.*', 'course_bookings.status', 'course_bookings.created_at as purchased_at')
    ->get();

    // Fetch videos separately
    $courseIds = $data['courses']->pluck('id')->toArray();
    $videos = DB::table('coursesnews_videos')
        ->whereIn('c_parent_id', $courseIds)
        ->get()
        ->groupBy('c_parent_id'); // group videos by course id

    // Attach videos to each course
    foreach ($data['courses'] as $course) {
        $course->videos = $videos[$course->id] ?? [];
    }

    // Decode only if $data['course'] exists and has a video
    /*if ($data['course'] && !empty($data['course']->video)) {
        $data['course']->video = json_decode($data['course']->video, true);
    }*/ 

    return view('course-videos', $data);
}
}