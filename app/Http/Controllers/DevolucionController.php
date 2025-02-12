<?php

namespace App\Http\Controllers;

use App\Models\Devolucion;
use App\Models\Producto;
use App\Models\Cliente;
use Illuminate\Http\Request;

class DevolucionController extends Controller
{
    // Obtener el cliente asociado al usuario actual
    private function getCliente()
    {
        return Cliente::where('usuario_id', auth()->id())->first();
    }

    // Registrar una devolución
    public function registrar(Request $request, $producto_id)
    {
        $producto = Producto::findOrFail($producto_id);
        $cliente = $this->getCliente();

        if (!$cliente) {
            return redirect()->route('perfil')->with('error', 'Debe completar su perfil antes de realizar devoluciones.');
        }

        Devolucion::create([
            'usuario_id' => $cliente->usuario_id,
            'producto_id' => $producto_id,
            'cantidad' => $request->cantidad,
            'motivo' => $request->motivo
        ]);

        return redirect()->route('devoluciones.index');
    }
}
