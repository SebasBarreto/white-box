<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MensajesController extends Controller
{
    // Mostrar los mensajes del usuario
    public function index()
    {
        $mensajes = Auth::user()->mensajes; // Relación en el modelo User
        return view('mensajes.index', compact('mensajes'));
    }
}
