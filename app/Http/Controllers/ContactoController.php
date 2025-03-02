<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactoMail;

class ContactoController extends Controller
{
    public function enviarMensaje(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email',
            'mensaje' => 'required|string'
        ]);

        $datos = $request->all();
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactoMail($datos));

        return response()->json(['success' => 'Mensaje enviado correctamente.']);
    }
}
