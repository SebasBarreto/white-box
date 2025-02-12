<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuardadosController extends Controller
{
    // Mostrar vendedores o búsquedas guardadas
    public function index()
    {
        $guardados = Auth::user()->guardados; // Relación en el modelo User
        return view('guardados.index', compact('guardados'));
    }
}
