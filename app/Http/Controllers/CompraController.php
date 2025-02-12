<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Cliente;
use App\Models\Producto;

class CompraController extends Controller
{
    /**
     * Mostrar todas las compras del cliente autenticado.
     */
    public function index()
{
    // Obtener el usuario autenticado
    $usuario = auth()->user();

    // Obtener el cliente asociado al usuario autenticado
    $cliente = Cliente::where('usuario_id', $usuario->id)->first();

    if (!$cliente) {
        // Si no hay cliente, enviar solo el nombre del usuario
        return view('dashboard-complements.compras', [
            'compras' => collect(), // Enviar una colección vacía
            'cliente' => null,
            'usuario' => $usuario, // Enviar el usuario autenticado
            'mensaje' => null, // Sin mensaje de error
        ]);
    }

    // Obtener las compras asociadas al cliente
    $compras = Compra::where('cliente_id', $cliente->id)
        ->with('producto') // Relación con productos
        ->get();

    // Si no hay compras, mostrar un mensaje
    if ($compras->isEmpty()) {
        return view('dashboard-complements.compras', [
            'compras' => $compras,
            'cliente' => $cliente,
            'usuario' => $usuario, // Enviar el usuario autenticado
            'mensaje' => 'No tienes compras realizadas aún.',
        ]);
    }

    // Retornar la vista con las compras
    return view('dashboard-complements.compras', compact('compras', 'cliente', 'usuario'));
}

    /**
     * Crear una nueva compra.
     */

    public function iniciarCompra(Request $request)
    {
        $cliente = Cliente::where('usuario_id', auth()->id())->first();
    
         // Verificar si el cliente tiene datos incompletos
        if (!$cliente || !$cliente->direccion || !$cliente->ciudad || !$cliente->pais) {
            return redirect()->route('perfil.index')->with('error', 'Por favor, completa tu perfil antes de realizar un pedido.');
        }
    
         // Lógica para iniciar el pedido
        return view('compras.iniciar', compact('cliente'));
    }
    
    
    public function store(Request $request)
    {
        try {
            // Validar la solicitud
            $request->validate([
                'producto_id' => 'required|exists:producto,id',
                'cantidad' => 'required|integer|min:1',
            ]);

            // Obtener el cliente autenticado
            $cliente = $this->getCliente();

            // Obtener el producto
            $producto = Producto::findOrFail($request->producto_id);

            // Calcular el total
            $total = $producto->precio * $request->cantidad;

            // Crear la compra
            Compra::create([
                'cliente_id' => $cliente->id,
                'producto_id' => $producto->id,
                'cantidad' => $request->cantidad,
                'total' => $total,
                'fecha_compra' => now(),
            ]);

            return redirect()->route('compras.index')->with('success', 'Compra realizada con éxito.');
        } catch (\Exception $e) {
            return redirect()->route('compras.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Mostrar detalles de una compra específica.
     */
    public function show($id)
    {
        try {
            // Obtener el cliente autenticado
            $cliente = $this->getCliente();

            // Obtener la compra específica del cliente
            $compra = Compra::where('id', $id)
                ->where('cliente_id', $cliente->id)
                ->with('producto') // Relación con el producto
                ->firstOrFail();

            return view('dashboard-complements.compra-detalle', compact('compra'));
        } catch (\Exception $e) {
            return redirect()->route('compras.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Obtener el cliente autenticado.
     */
    private function getCliente()
    {
        $cliente = Cliente::where('usuario_id', auth()->id())->first();

        if (!$cliente) {
            throw new \Exception('No se encontró información de cliente. Por favor, verifica tus datos.');
        }

        return $cliente;
    }
}
