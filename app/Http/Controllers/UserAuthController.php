<?php 
namespace App\Http\Controllers;

use App\Models\UserLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;



class UserAuthController extends Controller
{
 



  /**
     * Display the login form.
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Assuming your login view is in resources/views/auth/login.blade.php
    }

    /**
     * Handle an authentication attempt.
     */

   public function logins(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = UserLogin::where('email', $request->email)->first();

    if (!$user) {
        // Email not found in database
        return redirect()->back()->with('error', 'You are not registered. Please register now.');
    }

    // Email exists, check password
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

        // Optional: Log login info
        UserLogin::create([
            'user_id'      => Auth::id(),
            'email'        => $request->email,
            'user_agent'   => $request->userAgent(),
            'ip_address'   => $request->ip(),
            'logged_in_at' => now(),
        ]);

        return redirect('/dashboard')->with('success', 'Logged in successfully.');
    }

    // Wrong password
    return redirect()->back()->with('error', 'Email already registered. Please login with correct password.');
}

//   public function logins(Request $request)
//     {
        
//         // Prepare input data excluding unwanted fields
        
//         $input=$request->except('_token','_url', '_method');

       
    
        
//         UserLogin::create($input);


//         return redirect()->back()->with('success',' Inserted Successfully');
//     }


    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out.'); // Redirect to homepage
    }



   public function registers(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:user_logins,email',
        'password' => 'required|confirmed|min:6',
    ]);

    $input = $request->except('_token', '_url', '_method');
    $input['password'] = bcrypt($input['password']);

    UserLogin::create($input);

    return redirect('/')
        ->with('success', 'Registration successful. Please login.')
        ->with('showLoginModal', true); // this is the key
}


}
