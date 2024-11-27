<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class BuscarController extends Controller
{
    /**
     * Maneja la lógica de búsqueda de productos y categorías.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Obtener el término de búsqueda ingresado por el usuario
        $query = $request->input('text');

        // Validar que el término de búsqueda no esté vacío
        if (!$query || trim($query) === '') {
            return redirect()->back()->with('error', 'Debe ingresar un término de búsqueda.');
        }

        // Búsqueda en la tabla de productos (por nombre o descripción)
        $productos = Producto::where('nombre', 'LIKE', "%{$query}%")
            ->orWhere('descripcion', 'LIKE', "%{$query}%")
            ->get();

        // Búsqueda en la tabla de categorías (por nombre)
        $categorias = Categoria::where('nombre', 'LIKE', "%{$query}%")->get();

        // Verificar si hay resultados antes de enviar la vista
        if ($productos->isEmpty() && $categorias->isEmpty()) {
            return view('buscar.resultados', [
                'query' => $query,
                'productos' => $productos,
                'categorias' => $categorias,
                'mensaje' => 'No se encontraron resultados para su búsqueda.',
            ]);
        }

        // Retornar la vista con los resultados
        return view('buscar.resultados', compact('query', 'productos', 'categorias'));
    }
}
