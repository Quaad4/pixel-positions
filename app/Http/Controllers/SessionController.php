<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate
        $attributes = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', Password::min(3)]
        ]);

        // attempt
        if(! Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'failure' => 'Sorry, no records match these credentials'
            ]);
        }

        // regenerate 
        $request->session()->regenerate();

        // redirect
        return redirect('/');

    }

    /**
     * 
     */
    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
