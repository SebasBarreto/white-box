<?php

namespace App\Http\Controllers;

use App\Models\Articulo;  // Asegúrate de que tienes el modelo Articulo

class ArticuloController extends Controller
{
    public function index()
    {
        // Obtener todos los artículos de la base de datos
        $articulos = Articulo::all();

        // Retornar la vista de ventas con los artículos
        return view('tienda.ventas.ventas', compact('articulos'));
    }
}
