<?php

namespace App\Http\Controllers;

use App\Models\PaymentCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentCardController extends Controller
{
    public function create()
    {
        return view('user.payment_cards.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'card_holder'     => ['required', 'string', 'max:255'],
        'card_number'     => ['required', 'string', 'max:20'],
        'expiration_date' => ['required', 'string', 'max:10'],
        'cvv'             => ['nullable', 'string', 'max:4'],
    ]);

    // Si el usuario no tiene tarjeta predeterminada, marcamos ésta como default
    $validated['is_default'] = !auth()->user()->paymentCards()->where('is_default', true)->exists();

    auth()->user()->paymentCards()->create($validated);

    return redirect('/user')->with('success', 'Tarjeta agregada correctamente.');
}

public function destroy(\App\Models\PaymentCard $paymentCard)
{
    // Verificar que la tarjeta pertenezca al usuario autenticado
    if ($paymentCard->user_id !== auth()->id()) {
        abort(403, 'No autorizado');
    }

    $paymentCard->delete();

    return redirect()->back()->with('success', 'Método de pago eliminado correctamente.');
}


}
