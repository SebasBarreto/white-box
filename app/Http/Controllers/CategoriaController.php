<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        // Obtener todas las categorías
        $categorias = Categoria::all();
        
        // Retornar la vista 'categoria' con las categorías
        return view('includes.categoria', compact('categorias'));
    }
}
