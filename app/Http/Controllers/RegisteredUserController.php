<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    // Muestra el perfil del usuario (asegúrate de tener la vista 'user')
    public function show()
    {
        $user = Auth::user();
        return view('user', compact('user'));
    }

    // Muestra el formulario de registro
    public function create()
    {
        return view('auth.register');
    }

    // Almacena el nuevo usuario junto a su dirección
    public function store()
    {
        // Validar datos del usuario y de la dirección
        $attributes = request()->validate([
            'first_name'  => ['required', 'string', 'max:255'],
            'last_name'   => ['required', 'string', 'max:255'],
            'email'       => ['required', 'email', 'unique:users,email'],
            'phone'       => ['required', 'numeric'],
            'password'    => ['required', Password::min(6), 'confirmed'],

            // Campos de dirección
            'street'      => ['required', 'string', 'max:255'],
            'city'        => ['required', 'string', 'max:255'],
            'state'       => ['required', 'string', 'max:255'],
            'country'     => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:20'],
        ]);

        // Crear el usuario (asegúrate de que en el modelo User estén en fillable estos campos)
        $user = User::create([
            'first_name' => $attributes['first_name'],
            'last_name'  => $attributes['last_name'],
            'email'      => $attributes['email'],
            'phone'      => $attributes['phone'],
            'password'   => bcrypt($attributes['password']),
        ]);

        // Crear una dirección asociada al usuario
        // Asegúrate de que el modelo User tenga definida la relación addresses()
        $user->addresses()->create([
            'street'      => $attributes['street'],
            'city'        => $attributes['city'],
            'state'       => $attributes['state'],
            'country'     => $attributes['country'],
            'postal_code' => $attributes['postal_code'],
            'type'        => 'home',   // Tipo de dirección (puedes permitir elegir otros tipos en el formulario)
            'is_default'  => true,     // Se marca esta dirección como predeterminada
        ]);

        Auth::login($user);

        return redirect('/')->with('success', 'Usuario registrado correctamente.');
    }

    public function update(Request $request)
{
    // Validate the incoming request data
    $attributes = $request->validate([
        'first_name'  => ['required', 'string', 'max:255'],
        'last_name'   => ['required', 'string', 'max:255'],
        'email'       => ['required', 'email', 'unique:users,email,' . auth()->id()],
        'phone'       => ['required', 'numeric'],
        // If you want to update the password, add password rules
        // 'password'    => ['sometimes', Password::min(6), 'confirmed'],
    ]);

    // Update the authenticated user
    $user = auth()->user();
    $user->update($attributes);

    // Optionally, update the user's default address if you're including address fields in the update form
    if($request->filled('city')) {
        $defaultAddress = $user->addresses()->where('is_default', true)->first();
        if($defaultAddress) {
            $defaultAddress->update([
                'city' => $request->input('city'),
                // Add more fields if necessary
            ]);
        }
    }

    return redirect('/user')->with('success', 'Datos actualizados correctamente.');
}

}
