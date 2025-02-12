<?php

namespace App\Http\Controllers;

use App\Models\Envio;
use App\Models\Producto;
use App\Models\Cliente;
use Illuminate\Http\Request;

class EnvioController extends Controller
{
    // Obtener el cliente asociado al usuario actual
    private function getCliente()
    {
        return Cliente::where('usuario_id', auth()->id())->first();
    }

    // Registrar un envío
    public function registrar(Request $request, $producto_id)
    {
        $producto = Producto::findOrFail($producto_id);
        $cliente = $this->getCliente();

        if (!$cliente) {
            return redirect()->route('perfil')->with('error', 'Debe completar su perfil antes de realizar un envío.');
        }

        Envio::create([
            'usuario_id' => $cliente->usuario_id,
            'producto_id' => $producto_id,
            'direccion' => $request->direccion,
            'estado' => 'pendiente'
        ]);

        return redirect()->route('envios.index');
    }
}
