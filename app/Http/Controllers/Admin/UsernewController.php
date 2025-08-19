<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserActivated;
use Illuminate\Support\Facades\Log;

class UsernewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::latest()->where('role','user')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    public function updateStatus($id)
    {

    $user = User::findOrFail($id);

    //$status = $request->status; // should be 'active', 'blocked', or 'pending'

    if ($user->status=="active") {
        $status = "inactive";
    }
    else
    {
        $status = "active";
    }

    $user->status = $status;
    $user->save();

    if ($status === 'active') {
        //Log::info('Sending activation email to: ' . $user->email);

        // Make sure $user has plain password available
        // If it's not stored, use a temporary password and send that
        //$password = 'test@123456'; // or generate one and update it

        //Mail::to($user->email)->send(new UserActivated($user, $password));
    }

    return back()->with('success', 'User status updated successfully.');

}


     public function resetDevice($id)
    {

    $user = User::findOrFail($id);

    //$status = $request->status; // should be 'active', 'blocked', or 'pending'

    $user->device_fingerprint = NULL;
    
    $user->save();

    return back()->with('success', 'User device reset success.');

}






    public function destroy($id)
    {
        $user = Users::findOrFail($id);
        $user->delete();
        return back()->with('success', 'User deleted successfully.');
    }

  public function ViewUsers($user_id)
{
    $user = User::findOrFail($user_id);

    return view('admin.users.view', compact('user'));
}


  
}
