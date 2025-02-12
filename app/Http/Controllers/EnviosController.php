<?php

namespace App\Http\Controllers;

use App\Models\Envio;
use Illuminate\Http\Request;

class EnviosController extends Controller
{
    public function index()
    {
        // Obtén todos los envíos o filtra por usuario autenticado si es necesario
        $envios = Envio::where('idpedido', auth()->id())->get();

        // Retorna la vista con los datos
        return view('dashboard-complements.envios', compact('envios'));
    }



    public function crear(Request $request)
    {
        $request->validate([
            'idpedido' => 'required|exists:compras,id',
            'empresa_envio' => 'required|string',
            'metodo_envio' => 'required|in:standard,express,retiro en tienda',
            'costo_envio' => 'required|numeric',
            'fecha_estimada_entrega' => 'required|date',
        ]);

        Envio::create($request->all());

        return redirect()->route('envios.index')->with('success', 'Envío creado correctamente');
    }
}
