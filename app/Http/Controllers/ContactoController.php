<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        return view('components.contacto');
    }

    public function submit(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Lógica para enviar el mensaje, por ejemplo, un correo electrónico
        return redirect()->back()->with('success', 'Mensaje enviado correctamente.');
    }
}
