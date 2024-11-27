<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Atributo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    // Método para listar todos los productos con atributos
    public function index()
    {
        // Obtén todos los productos con sus atributos y valores
        $productos = Producto::with('atributos.atributo')->get();
        
        return view('productos.index', compact('productos'));
    }

    // Método para mostrar el detalle de un producto específico
    public function show($categoria_slug, $producto_slug)
    {
        // Obtener la categoría por slug
        $categoria = Categoria::where('slug', $categoria_slug)->firstOrFail();
        
        // Obtener el producto por slug y categoría
        $producto = Producto::where('slug', $producto_slug)
            ->where('idcategoria', $categoria->id)
            ->with('atributos.atributo') // Cargar atributos del producto
            ->firstOrFail();

        // Decodificar características JSON si existen
        $producto->caracteristicas = (!empty($producto->caracteristicas) && is_string($producto->caracteristicas))
            ? json_decode($producto->caracteristicas, true)
            : [];

        // Comentarios del producto
        $comentarios = DB::table('comentarios')
            ->where('producto_id', $producto->id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Productos relacionados de la misma categoría
        $productosRelacionados = Producto::where('idcategoria', $producto->idcategoria)
            ->where('id', '!=', $producto->id)
            ->take(5)
            ->get();

        return view('components.producto_detalle', compact('producto', 'productosRelacionados', 'categoria', 'comentarios'));
    }

    // Método para listar productos por categoría
    public function mostrarPorCategoria($slug)
    {
        // Obtener la categoría por su slug y cargar sus productos con atributos
        $categoria = Categoria::where('slug', $slug)
            ->with(['productos' => function ($query) {
                $query->with('atributos.atributo');
            }])
            ->firstOrFail();

        return view('components.categoria_detalle', compact('categoria'));
    }

    // Método para cambiar el estado de un producto en el carrito
    public function toggleCarrito(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->en_carrito = !$producto->en_carrito; // Cambia el estado de en_carrito
        $producto->save();

        return response()->json(['en_carrito' => $producto->en_carrito]);
    }

    // Método para cambiar el estado de un producto en favoritos
    public function toggleFavorito(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->es_favorito = !$producto->es_favorito; // Cambia el estado de es_favorito
        $producto->save();

        return response()->json(['es_favorito' => $producto->es_favorito]);
    }
}
