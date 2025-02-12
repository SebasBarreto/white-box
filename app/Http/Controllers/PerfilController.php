<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class PerfilController extends Controller
{
    public function index()
    {
        $usuario = auth()->user();
        $cliente = Cliente::where('usuario_id', $usuario->id)->first();
        return view('dashboard-complements.perfil', compact('usuario', 'cliente'));
    }

    public function edit()
    {
        $usuario = auth()->user();
        $cliente = Cliente::where('usuario_id', $usuario->id)->first();
        return view('dashboard-complements.perfil-editar', compact('usuario', 'cliente'));
    }

    public function update(Request $request)
    {
        $usuario = auth()->user(); // Obtener el usuario autenticado

        // Validar los datos enviados desde el formulario
        $request->validate([
            'direccion' => 'required|string|max:255',
            'ciudad' => 'required|string|max:100',
            'pais' => 'required|string|max:50',
            'cedula' => [
                'nullable',
                'string',
                'min:6',
                'max:11',
                'unique:cliente,cedula,' . optional($usuario->cliente)->id,
            ],
        ]);

        // Buscar cliente asociado o inicializar uno nuevo
        $cliente = Cliente::firstOrNew(['usuario_id' => $usuario->id]);

        // Asignar valores al modelo
        $cliente->nombre = $usuario->name;
        $cliente->email = $usuario->email;
        $cliente->telefono = $usuario->phone;
        $cliente->direccion = $request->direccion;
        $cliente->ciudad = $request->ciudad;
        $cliente->pais = $request->pais;

        // Si no existe la cédula, se asigna
        if (!$cliente->exists || is_null($cliente->cedula)) {
            $cliente->cedula = $request->cedula;
        }

        $cliente->save(); // Guardar cliente

        // Redirigir al perfil con un mensaje de éxito
        return redirect()->route('perfil.index')->with('success', 'Perfil actualizado correctamente.');
    }
}