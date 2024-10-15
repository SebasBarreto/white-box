<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Categoria;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function index()
    {
        $productos = Articulo::all();
        $categorias = Categoria::all();

        return view('tienda.ventas', [
            'productos' => $productos,
            'categorias' => $categorias
        ]);
    }
}
