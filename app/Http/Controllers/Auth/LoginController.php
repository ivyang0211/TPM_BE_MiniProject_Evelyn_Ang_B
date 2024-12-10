<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Create the login view
    }

    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $isValidCredentials = Auth::attempt(
            $request->only('email', 'password'), 
            $request->filled('remember'));

        // Attempt to authenticate the user
        if (!$isValidCredentials) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        // If authentication fails        
        return redirect()->route('home'); // Redirect after login
    }
}
