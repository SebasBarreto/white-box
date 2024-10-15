<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class ArticuloController extends Controller
{
    // Función para mostrar artículos por categoría
    public function mostrarPorCategoria($idcategoria)
    {
        // Obtén todos los artículos que pertenecen a la categoría seleccionada
        $articulos = Articulo::where('idcategoria', $idcategoria)->get();
        
        // Retorna la vista y pasa los artículos para que se muestren
        return view('articulos.index', compact('articulos'));
    }
}
