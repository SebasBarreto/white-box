<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\CarritoDetalle;
use App\Models\Producto;
use App\Models\Cliente;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    // Obtener el cliente asociado al usuario actual
    private function getCliente()
    {
        return Cliente::where('usuario_id', auth()->id())->first();
    }

    // Mostrar el carrito
    public function index()
    {
        $cliente = $this->getCliente();

        if (!$cliente) {
            return redirect()->route('perfil')->with('error', 'Debe completar su perfil antes de acceder al carrito.');
        }

        // Obtener los productos en el carrito del cliente
        $carrito = CarritoDetalle::whereHas('carrito', function ($query) use ($cliente) {
            $query->where('usuario_id', $cliente->usuario_id);
        })->with('producto')->get();

        return view('dashboard-complements.carrito', compact('carrito'));
    }

    // Agregar producto al carrito
    public function agregar(Request $request, $producto_id)
    {
        $producto = Producto::findOrFail($producto_id);

        $cliente = $this->getCliente();
        if (!$cliente) {
            return redirect()->route('perfil')->with('error', 'Debe completar su perfil antes de agregar productos al carrito.');
        }

        $carrito = Carrito::firstOrCreate(['usuario_id' => $cliente->usuario_id]);

        // Comprobar si el producto ya está en el carrito
        $detalle = CarritoDetalle::firstOrNew([
            'idcarrito' => $carrito->id,
            'idproducto' => $producto_id,
        ]);

        // Actualizar cantidad y subtotal
        $detalle->cantidad += $request->cantidad ?? 1;
        $detalle->precio_unitario = $producto->precio;
        $detalle->subtotal = $detalle->cantidad * $detalle->precio_unitario;
        $detalle->save();

        return redirect()->route('carrito.index');
    }

    // Eliminar producto del carrito
    public function eliminar($detalle_id)
    {
        CarritoDetalle::findOrFail($detalle_id)->delete();
        return redirect()->route('carrito.index');
    }

    // Cambiar el estado del producto (agregar o eliminar) en el carrito
    public function toggle($productoId, Request $request)
    {
        try {
            $cliente = $this->getCliente();
            if (!$cliente) {
                return response()->json(['success' => false, 'message' => 'Debe completar su perfil antes de agregar productos al carrito.']);
            }

            $carrito = Carrito::firstOrCreate(['usuario_id' => $cliente->usuario_id]);

            // Buscar si el producto ya está en el carrito
            $detalle = CarritoDetalle::where('idcarrito', $carrito->id)
                ->where('idproducto', $productoId)
                ->first();

            if ($detalle) {
                // Si ya está en el carrito, eliminarlo
                $detalle->delete();
                return response()->json(['success' => true, 'message' => 'Producto eliminado del carrito.']);
            } else {
                // Si no está en el carrito, agregarlo
                $producto = Producto::findOrFail($productoId); // Buscar el producto
                CarritoDetalle::create([
                    'idcarrito' => $carrito->id,
                    'idproducto' => $productoId,
                    'cantidad' => 1, // Cantidad predeterminada
                    'precio_unitario' => $producto->precio,
                    'subtotal' => $producto->precio, // Subtotal al principio es igual al precio unitario
                ]);
                return response()->json(['success' => true, 'message' => 'Producto agregado al carrito.']);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Ocurrió un error: ' . $e->getMessage()], 500);
        }
    }
}
