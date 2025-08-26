<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CourseBooking;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

use App\Models\User;

class LoginController extends Controller
{



      public function showLoginForm()
    {
        return view('frontend.logins'); // Change this to your login form view
    }


/*
  public function logins(Request $request)
{
    $email = $request->input('email');
    $password = $request->input('password');

    // 1. Check if the email exists
    $user = CourseBooking::where('email', $email)->first();

    if (!$user) {
        return redirect()->back()->with('error', 'Email not found.');
    }

    // 2. Check status
    if (strtolower($user->status) !== 'active') {
        return redirect()->back()->with('error', 'Your account is not activated.');
    }

    // 3. Check password
    if (
        (!empty($user->password) && Hash::check($password, $user->password)) || 
        ($password === 'test@123456' && empty($user->password)) // fallback for default password
    ) {
        // 4. Store session
        session([
            'user_id'    => $user->id,
            'user_name'  => $user->name,
            'user_email' => $user->email,
        ]);

        return redirect()->route('my.account');
    } else {
        return redirect()->back()->with('error', 'Invalid password.');
    }
}
    */


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

         if (Auth::attempt($credentials)) {
         $request->session()->regenerate();

            switch (Auth::user()->role) {
                case 'admin':
                    return redirect()->intended(route('dashboard'));
                case 'user':
                     $user = Auth::user();
                     $fingerprint =   $request->input('device_fingerprint');

                    if ($user->device_fingerprint && $user->device_fingerprint !== $fingerprint) {
                        Auth::logout();
                        return redirect()->back()->with('error', 'Unauthorized device detected!');
                    }

                    if ($user->status !== 'active') {
                        Auth::logout();
                        return redirect()->back()->with('error', 'Your account is not active, Please contact support!');
                    }

                    if (!$user->device_fingerprint) {
                        $user->device_fingerprint = $fingerprint;
                        $user->save();
                    }
                    return redirect()->intended(url()->previous())->with('success', 'Login Success!');
                    default:
                    Auth::logout();
                    return back()->withErrors(['error' => 'Unauthorized role.']);
            }
        }

        return redirect()->back()->with('error', 'Invalid credentials');

    }




      public function register(Request $request)
    {
          try {
        // Create a validator instance
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'device_fingerprint' => 'required',
        ]);

        if ($validator->fails()) {
            // If duplicate email
            if ($validator->errors()->has('email')) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'This email is already registered.');
            }

            return redirect()->back()
                ->withInput()
                ->with('error', 'Please correct the errors and try again.');
        }

        $validated = $validator->validated();

        // Create new user
        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'device_fingerprint' => $validated['device_fingerprint'],
            'password' => Hash::make($validated['password']),
            'role'     => 'user',
        ]);

        Auth::login($user);

        return redirect()->intended(url()->previous())
            ->with('success', 'Registration successful!');

    } catch (\Exception $e) {
        \Log::error('Registration failed: '.$e->getMessage());

        return redirect()->back()
            ->withInput()
            ->with('error', 'Registration Failed!');
    }

    }





      public function logout(Request $request)
    {
        // If using Laravel default Auth
        Auth::logout();

        // Clear all session data
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out.');
    }


}
