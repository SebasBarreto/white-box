<?php

namespace App\Http\Controllers;

use App\Models\Encargo;
use App\Models\Producto;
use App\Models\Cliente;
use Illuminate\Http\Request;

class EncargoController extends Controller
{
    // Obtener el cliente asociado al usuario actual
    private function getCliente()
    {
        return Cliente::where('usuario_id', auth()->id())->first();
    }

    // Registrar un encargo
    public function registrar(Request $request, $producto_id)
    {
        $producto = Producto::findOrFail($producto_id);
        $cliente = $this->getCliente();

        if (!$cliente) {
            return redirect()->route('perfil')->with('error', 'Debe completar su perfil antes de realizar encargos.');
        }

        Encargo::create([
            'usuario_id' => $cliente->usuario_id,
            'producto_id' => $producto_id,
            'cantidad' => $request->cantidad,
            'estado' => 'pendiente' // Establecer un estado inicial
        ]);

        return redirect()->route('encargos.index');
    }
}
