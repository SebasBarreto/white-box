<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class PreController extends Controller
{
    public function index()
    {
        return view('tienda.pre');
    }
}