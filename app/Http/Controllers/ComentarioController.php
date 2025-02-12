<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;

class ComentarioController extends Controller
{
    public function store(Request $request, $productoId)
    {
        $request->validate([
            'comentario' => 'required|string|max:500',
        ]);

        Comentario::create([
            'producto_id' => $productoId,
            'usuario_id' => auth()->id(),
            'comentario' => $request->comentario,
        ]);

        return redirect()->back()->with('success', 'Comentario añadido correctamente.');
    }

    public function index($productoId)
    {
        $comentarios = Comentario::where('producto_id', $productoId)
            ->with('usuario') // Asumiendo que tienes una relación con el usuario
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($comentarios);
    }
}
