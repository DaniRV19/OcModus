<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    // Muestra el formulario para crear una nueva dirección
    public function create()
    {
        return view('user.addresses.create');
    }

    // Almacena la nueva dirección asociada al usuario autenticado
    public function store(Request $request)
    {
        $validated = $request->validate([
            'street'      => ['required', 'string', 'max:255'],
            'city'        => ['required', 'string', 'max:255'],
            'state'       => ['required', 'string', 'max:255'],
            'country'     => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:20'],
            'type'        => ['required', 'in:home,work,vacation'], // Ajusta según las opciones que quieras
        ]);

        // Si el usuario no tiene dirección predeterminada, marcamos ésta como default
        $validated['is_default'] = !Auth::user()->addresses()->where('is_default', true)->exists();

        Auth::user()->addresses()->create($validated);

        return redirect()->back()->with('success', 'Dirección agregada correctamente.');
    }

    // Muestra el formulario para editar una dirección existente
    public function edit(Address $address)
    {
        // Verificar que la dirección pertenezca al usuario autenticado
        if ($address->user_id !== Auth::id()) {
            abort(403, 'No autorizado');
        }
        return view('user.addresses.edit', compact('address'));
    }

    // Actualiza la dirección
    public function update(Request $request, Address $address)
{
    // Verificar que la dirección pertenece al usuario autenticado
    if ($address->user_id !== auth()->id()) {
        abort(403, 'No autorizado');
    }

    // Validar los datos ingresados
    $validated = $request->validate([
        'street'      => ['required', 'string', 'max:255'],
        'city'        => ['required', 'string', 'max:255'],
        'state'       => ['required', 'string', 'max:255'],
        'country'     => ['required', 'string', 'max:255'],
        'postal_code' => ['required', 'string', 'max:20'],
        'type'        => ['required', 'in:home,work,vacation'],
    ]);

    // Actualizar la dirección
    $address->update($validated);

    // Redirigir a /user con un mensaje de éxito
    return redirect('/user')->with('success', 'Dirección actualizada correctamente.');
}

    // Elimina una dirección
    public function destroy(Address $address)
    {
        if ($address->user_id !== Auth::id()) {
            abort(403, 'No autorizado');
        }
        $address->delete();
        return redirect()->back()->with('success', 'Dirección eliminada correctamente.');
    }
}
