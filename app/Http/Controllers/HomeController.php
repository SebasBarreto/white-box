<?php

namespace App\Http\Controllers;

use App\Models\Producto; // Asegúrate de importar el modelo Producto

class HomeController extends Controller
{
    public function index()
    {
        // Redirige a la función home()
        return $this->home();
    }

    public function home()
    {
        // Obtén 8 productos aleatorios con categoría
        $productos = Producto::with('categoria')->inRandomOrder()->limit(8)->get();

        // Devuelve la vista con los productos
        return view('home', compact('productos'));
    }
}
