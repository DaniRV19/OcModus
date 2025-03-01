<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        // Validar datos del usuario y de la dirección
        $attributes = request()->validate([
            'first_name'  => ['required'],
            'last_name'   => ['required'],
            'email'       => ['required', 'email'],
            'phone'       => ['required', 'numeric'],
            'password'    => ['required', Password::min(6), 'confirmed'],

            // Campos de dirección
            'street'      => ['required'],
            'city'        => ['required'],
            'state'       => ['required'],
            'country'     => ['required'],
            'postal_code' => ['required'],
        ]);

        // Crear el usuario (recordando cifrar la contraseña)
        $user = User::create([
            'first_name' => $attributes['first_name'],
            'last_name'  => $attributes['last_name'],
            'email'      => $attributes['email'],
            'phone'      => $attributes['phone'],
            'password'   => bcrypt($attributes['password']),
        ]);

        // Crear una dirección asociada al usuario
        $user->addresses()->create([
            'street'      => $attributes['street'],
            'city'        => $attributes['city'],
            'state'       => $attributes['state'],
            'country'     => $attributes['country'],
            'postal_code' => $attributes['postal_code'],
            'type'        => 'home',   // Tipo de dirección, por ejemplo 'home'
            'is_default'  => true,     // Marcamos esta dirección como la predeterminada
        ]);

        Auth::login($user);

        return redirect('/');
    }
}
