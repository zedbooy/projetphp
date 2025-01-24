<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show the sign-in form
    public function showSignInForm()
    {
        return view('signin'); // Ensure this view file exists in the resources/views directory
    }

    // Handle sign-in logic
    public function signIn(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('etudiant'); // Redirect to the etudiant page after login
        }

        return back()->withErrors([
            'message' => 'Utilisateur non trouvé',
        ])->onlyInput('email');
    }

    // Handle logout logic
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('signin');
    }
}