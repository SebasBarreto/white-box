<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        return view('tienda.contacto'); // Asegúrate de que esta vista existe en `resources/views/tienda/contacto.blade.php`
    }

    public function store(Request $request)
    {
        // Código para almacenar el contacto
    }
}
