<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Muestra el contenido del carrito
    public function index()
    {
        // Obtener el carrito desde la sesión (o un array vacío si no existe)
        $cart = session()->get('cart', []);
        
        // Calcular el total del carrito
        $total = array_reduce($cart, function ($sum, $item) {
            return $sum + $item['price'] * $item['quantity'];
        }, 0);

        return view('cart.index', compact('cart', 'total'));
    }

    // Agrega un producto al carrito
    public function add(Request $request)
    {
        $product = Product::find($request->product_id);

        if (!$product) {
            return redirect()->back()->with('error', 'Producto no encontrado.');
        }

        // Obtener el carrito de la sesión
        $cart = session()->get('cart', []);

        // Si el producto ya está en el carrito, solo incrementa la cantidad
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            // Agregar el producto al carrito
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }

        // Guardar el carrito en la sesión
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Producto agregado al carrito.');
    }

    // Actualiza la cantidad de un producto en el carrito
    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');

            // Verificar si el producto existe en el carrito y actualizar la cantidad
            if (isset($cart[$request->id])) {
                $cart[$request->id]['quantity'] = $request->quantity;
                session()->put('cart', $cart);

                return redirect()->route('cart.index')->with('success', 'Carrito actualizado.');
            }
        }

        return redirect()->route('cart.index');
    }

    // Elimina un producto del carrito
    public function remove(Request $request)
    {
        $cart = session()->get('cart');

        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Producto eliminado del carrito.');
    }
}
