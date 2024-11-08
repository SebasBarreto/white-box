<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        // Obtener solo las categorías que tienen al menos un artículo
        $categorias = Categoria::has('articulos')->get();
        return view('includes.categoria', compact('categorias'));
    }

    public function show($slug)
    {
        $categoria = Categoria::where('slug', $slug)->firstOrFail();
        return view('includes.categoria', ['categorias' => [$categoria]]);
    }
}
