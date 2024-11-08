<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Articulo;

class ArticuloController extends Controller
{
    public function mostrarPorCategoria($slug)
    {
        // Buscar la categoría por slug
        $categoria = Categoria::where('slug', $slug)->firstOrFail();

        // Obtener los artículos asociados con la categoría
        $articulos = Articulo::where('idcategoria', $categoria->idcategoria)->get();

        // Pasar la categoría y sus artículos a la vista
        return view('includes.categoria_detalle', compact('categoria', 'articulos'));
    }
}
