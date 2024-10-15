<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encargo; 

class EncargoController extends Controller
{
    // Método para mostrar el formulario
    public function index()
    {
        return view('tienda.encargo');
    }

    // Método para manejar el formulario enviado
    public function store(Request $request)
    {
        Encargo::create($request->all()); // Almacena el encargo en la BD
        return redirect()->route('encargo.index')->with('success', 'Encargo recibido!');
        $request->validate([
            'producto' => 'required|string|max:255',
            'cantidad' => 'required|integer',
            'email' => 'required|email',
            // Agrega las validaciones necesarias
        ]);

        // Guardar el encargo en la base de datos
        Encargo::create([
            'producto' => $request->producto,
            'cantidad' => $request->cantidad,
            'email' => $request->email,
            'origen' => $request->origen,
            'transporte' => $request->transporte,
            'precio' => $request->precio,
        ]);

        // Redirigir o mostrar mensaje de éxito
        return redirect()->back()->with('success', '¡Tu encargo ha sido recibido!');
    }
}
