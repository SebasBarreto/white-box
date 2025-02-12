<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use App\Models\Producto;
use Illuminate\Http\Request;
use Termwind\Components\Raw;

class FavoritosController extends Controller
{
    public function index()
    {
        $favoritos = Favorito::where('idusuario', auth()->id())->with('producto')->get();
        return view('dashboard-complements.favoritos', compact('favoritos'));
    }

    public function agregar($producto_id)
    {
        $usuarioId = auth()->id();

        // Verificar si el producto ya está en favoritos
        $favoritoExistente = Favorito::where('idusuario', $usuarioId)
                                    ->where('idproducto', $producto_id)
                                    ->first();

        if ($favoritoExistente) {
            return redirect()->route('favoritos.index')->with('error', 'Este producto ya está en tus favoritos.');
        }

        // Agregar a favoritos si no existe
        Favorito::create([
            'idusuario' => $usuarioId,
            'idproducto' => $producto_id,
        ]);

        return redirect()->route('favoritos.index')->with('success', 'Producto agregado a favoritos.');
    }

    public function toggle($productoId, Request $request)
    {
        $usuarioId = auth()->id();
        $favorito = Favorito::where('idusuario', $usuarioId)->where('idproducto', $productoId)->first();

        if ($favorito) {
            $favorito->delete(); // Elimina de favoritos
            return response()->json(['success' => true, 'message' => 'Eliminado de favoritos.']);
        } else {
            Favorito::create([
                'idusuario' => $usuarioId,
                'idproducto' => $productoId,
            ]); // Agrega a favoritos
            return response()->json(['success' => true, 'message' => 'Agregado a favoritos.']);
        }
    }
    public function destroy($favorito_id)
    {
        Favorito::findOrFail($favorito_id)->delete();
        return redirect()->route('favoritos.index')->with('success', 'Producto eliminado de favoritos.');
    }
}
