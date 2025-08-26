<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseBooking;
use App\Models\User;
use App\Models\Coursesnew;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CoursePurchaseController extends Controller
{
    public function index()
    {
        // Fetch all course bookings with related user & course info
        $purchases = CourseBooking::with(['user', 'course'])->orderBy('created_at', 'desc')->get();

        return view('admin.course_purchases.index', compact('purchases'));
    }

    public function updateStatus(Request $request, $id)
    {
        $purchase = CourseBooking::findOrFail($id);

        $course = DB::table('coursesnews')
        ->where('id', $purchase->course_id)->first();

        if($request->status=='active')
        {
            
            $course_expiry = $course->duration; 

            $today = Carbon::today();

            $expiry = Carbon::today();

            $activation_date = $today;

            $expiration_date = $expiry->addDays($course_expiry-1);

            $purchase->activation_date = $activation_date;

            $purchase->ending_date = $expiration_date;

        }

        $purchase->status = $request->status;

        $purchase->save();

        return back()->with('success', 'Purchase status updated successfully.');

    }

    
}
