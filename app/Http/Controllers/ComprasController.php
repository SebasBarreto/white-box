<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Carrito;
use Illuminate\Http\Request;

class ComprasController extends Controller
{
    public function index()
{
    $compras = Compra::where('cliente_id', auth()->id())->with('producto')->get();

    // Si necesitas enviar un cliente a la vista, asegúrate de definir esta variable.
    $cliente = auth()->user(); // Esto obtiene al usuario autenticado

    return view('dashboard-complements.compras', compact('compras', 'cliente'));
}


    public function realizarCompra()
    {
        $carrito = Carrito::where('idusuario', auth()->id())->first();
        if (!$carrito) {
            return redirect()->route('carrito.index')->with('error', 'No hay productos en el carrito');
        }

        foreach ($carrito->detalles as $detalle) {
            Compra::create([
                'cliente_id' => auth()->id(),
                'producto_id' => $detalle->idproducto,
                'cantidad' => $detalle->cantidad,
                'total' => $detalle->subtotal,
                'fecha_compra' => now(),
            ]);
        }

        $carrito->delete();

        return redirect()->route('compras.index')->with('success', 'Compra realizada con éxito');
    }
}
