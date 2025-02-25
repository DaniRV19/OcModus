<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (! Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Lo sentimos, las credenciales no son correctas.'
            ]);
        }

        request()->session()->regenerate();

        return redirect('/login');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
