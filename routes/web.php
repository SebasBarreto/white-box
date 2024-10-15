<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\EncargoController;
use App\Http\Controllers\PreController;
use App\Http\Controllers\BuscarController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ArticuloController;


// rutas GET
Route::get('/', [HomeController::class, 'index']);

// Redirigir la ruta de ventas directamente a la página de categorías
Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index');
Route::get('/categoria/{idcategoria}', [CategoriaController::class, 'show'])->name('ventas.categoria');
Route::get('/tienda/ventas', function () {return redirect()->route('categoria.index');})->name('ventas.index');
Route::get('/categoria/{idcategoria}', [ArticuloController::class, 'mostrarPorCategoria'])->name('articulos.categoria');

// Otras rutas GET
Route::get('/tienda/pre', [PreController::class, 'index']);
Route::get('/tienda/encargo', [EncargoController::class, 'index'])->name('encargo.index');
Route::get('/tienda/buscar', [BuscarController::class, 'index']);
Route::get('/tienda/contacto', [ContactoController::class, 'index'])->name('contacto.index');

// Ruta de la página de categorías con controlador
Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index');

// rutas POST
Route::post('/tienda/encargo', [EncargoController::class, 'store'])->name('encargo.store');

Route::post('/enviar-contacto', function (Illuminate\Http\Request $request) {
    // Aquí puedes manejar los datos del formulario, como enviarlos por email o guardarlos en la base de datos.
    return back()->with('success', 'Tu mensaje ha sido enviado correctamente.');
});
