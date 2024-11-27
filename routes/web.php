<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EncargoController;
use App\Http\Controllers\PreController;
use App\Http\Controllers\BuscarController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ComentarioController;

// Rutas GET de Autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::get('/admin', [AdminController::class, 'index'])->middleware('role:admin');
Route::get('/cliente', [ClienteController::class, 'index'])->middleware('role:cliente');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/settings', [AdminController::class, 'settings']);
});

// Rutas GET principales
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/buscar', [BuscarController::class, 'index'])->name('buscar');


// Rutas de Categorías y Productos
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index'); // Lista todas las categorías
Route::get('/categoria/{slug}', [CategoriaController::class, 'show'])->name('categoria.show'); // Muestra los productos de una categoría específica
Route::get('/tienda/ventas', function () {
    return redirect()->route('categoria.index');
})->name('ventas.index');

// Otras Rutas GET de la tienda
Route::get('/components/preventa', [PreController::class, 'index'])->name('pre.index');
Route::get('/components/encargo', [EncargoController::class, 'index'])->name('encargo.index');
Route::get('/components/buscar', [BuscarController::class, 'index'])->name('buscar.index');
Route::get('/components/contacto', [ContactoController::class, 'index'])->name('contacto.index');
Route::get('/categoria/{categoria_slug}/producto/{producto_slug}', [ProductoController::class, 'show'])->name('producto.detalle');
Route::get('/producto/{categoria_slug}/{producto_slug}', [ProductoController::class, 'show'])->name('producto.detalle');



// Ruta del dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas POST de Autenticación
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/guardar-comentario', [ComentarioController::class, 'store'])->name('guardarComentario');

// Otras Rutas POST
Route::post('/contacto/enviar', [ContactoController::class, 'submit'])->name('contact.submit');
Route::post('/components/encargo', [EncargoController::class, 'store'])->name('encargo.store');
Route::post('/enviar-contacto', function (Illuminate\Http\Request $request) {
Route::post('/producto/{id}/toggle-carrito', [ProductoController::class, 'toggleCarrito'])->name('producto.toggleCarrito');
Route::post('/producto/{id}/toggle-favorito', [ProductoController::class, 'toggleFavorito'])->name('producto.toggleFavorito');
    
    // Aquí puedes manejar los datos del formulario, como enviarlos por email o guardarlos en la base de datos.
    return back()->with('success', 'Tu mensaje ha sido enviado correctamente.');
});

