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
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Rutas GET de Autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Rutas GET principales
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index');
Route::get('/categoria/{idcategoria}', [CategoriaController::class, 'show'])->name('ventas.categoria');
Route::get('/tienda/ventas', function () {
    return redirect()->route('categoria.index');
})->name('ventas.index');
Route::get('/categoria/{idcategoria}', [ArticuloController::class, 'mostrarPorCategoria'])->name('articulos.categoria');
Route::get('/tienda/pre', [PreController::class, 'index'])->name('pre.index');
Route::get('/tienda/encargo', [EncargoController::class, 'index'])->name('encargo.index');
Route::get('/tienda/buscar', [BuscarController::class, 'index'])->name('buscar.index');
Route::get('/tienda/contacto', [ContactoController::class, 'index'])->name('contacto.index');
Route::get('/tienda/ventas', [ArticuloController::class, 'index'])->name('ventas.index');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas POST de Autenticación
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/register', [RegisterController::class, 'register']);

// Otras Rutas POST
Route::post('/contacto/enviar', [ContactoController::class, 'submit'])->name('contact.submit');
Route::post('/tienda/encargo', [EncargoController::class, 'store'])->name('encargo.store');
Route::post('/enviar-contacto', function (Illuminate\Http\Request $request) {
    // Aquí puedes manejar los datos del formulario, como enviarlos por email o guardarlos en la base de datos.
    return back()->with('success', 'Tu mensaje ha sido enviado correctamente.');
});

// Rutas de Recursos
Route::resource('articulos', ArticuloController::class);

