<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Producto;


class CategoriaController extends Controller
{
    /**
     * Mostrar solo las categorías que tienen productos.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Solo obtener las categorías que tengan productos
        $categorias = Categoria::has('productos')->get();

        // Pasar las categorías a la vista
        return view('components.categoria', compact('categorias'));
    }

    /**
     * Mostrar los detalles de una categoría específica junto con sus productos.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
{
    // Obtener la categoría según el slug
    $categoria = Categoria::where('slug', $slug)->first();
    
    // Verificar que la categoría exista antes de buscar los productos
    if (!$categoria) {
        abort(404); // Muestra una página 404 si la categoría no existe
    }

    // Obtener los productos asociados a la categoría mediante el idcategoria
    $productos = Producto::where('idcategoria', $categoria->id)->get();

    // Asignar el valor del slug a $categorySlug
    $categorySlug = $slug;

    // Retornar la vista con las variables necesarias
    return view('components.categoria_detalle', compact('productos', 'categoria', 'categorySlug'));
}



}
