<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistorialController extends Controller
{
    // Mostrar historial de vistas del usuario
    public function index()
    {
        $historial = Auth::user()->historial; // Relación en el modelo User
        return view('historial.index', compact('historial'));
    }
}
