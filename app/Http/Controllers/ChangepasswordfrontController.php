<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seo;
use App\Models\Contact;
use App\Models\Banner;
use App\Models\Courses;
use App\Models\Page;

use Illuminate\Support\Facades\Hash;
use App\Models\CourseBooking;

class ChangepasswordfrontController extends Controller
{


public function changePassword(Request $request)
{

    $data['page_seo'] = Seo::find(1);
    $data['contact'] = Contact::find(1);
    
    return view('change-password',$data);

}


 public function updatePassword(Request $request)
    {
        // Validate form data
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = auth()->user();

        // Check current password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Your current password is incorrect.']);
        }

        // Update password
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Password updated successfully.');
    }

}