<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComentarioController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'producto_id' => 'required|integer|exists:producto,id',
            'nombre_usuario' => 'required|string|max:255',
            'comentario' => 'required|string',
            'calificacion' => 'required|integer|between:1,5',
        ]);

        // Insertar el comentario en la base de datos
        DB::table('comentarios')->insert([
            'producto_id' => $request->input('producto_id'),
            'nombre_usuario' => $request->input('nombre_usuario'),
            'comentario' => $request->input('comentario'),
            'calificacion' => $request->input('calificacion'),
            'created_at' => now(),
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Comentario agregado correctamente.');
    }
}
