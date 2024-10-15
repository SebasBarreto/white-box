<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class BuscarController extends Controller
{
    public function index()
    {
        return view('tienda.buscar');
    }
}
