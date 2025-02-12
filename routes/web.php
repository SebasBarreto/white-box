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
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\FavoritosController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\EnviosController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\ComentarioController;

// Rutas públicas (accesibles sin autenticación)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index');
Route::get('/categoria/{slug}', [CategoriaController::class, 'show'])->name('categoria.show');
Route::get('/categoria/{categoria_slug}/producto/{producto_slug}', [ProductoController::class, 'show'])->name('producto.detalle');
Route::get('/producto/{slug}', [ProductoController::class, 'show'])->name('producto.show');

// Redirección desde "ventas" hacia categorías
Route::get('/tienda/ventas', function () {
    return redirect()->route('categoria.index');
})->name('ventas.index');

// Rutas adicionales públicas
Route::get('/tienda/pre', [PreController::class, 'index'])->name('pre.index');
Route::get('/componentes/pre', [PreController::class, 'index'])->name('tienda.pre');
Route::get('/tienda/encargo', [EncargoController::class, 'index'])->name('tienda.encargo');
Route::get('/tienda/buscar', [BuscarController::class, 'index'])->name('buscar.index');
Route::get('/tienda/contacto', [ContactoController::class, 'index'])->name('contacto.index');

// Rutas de autenticación (login y registro)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Rutas protegidas (requieren autenticación)
Route::middleware('auth')->group(function () {
    // Dashboard principal
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas de perfil
    Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil.index');
    Route::get('/perfil/editar', [PerfilController::class, 'edit'])->name('perfil.editar');
    Route::patch('/perfil', [PerfilController::class, 'update'])->name('perfil.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    //Rutas Comentarios
    Route::post('/productos/{producto}/comentarios', [ComentarioController::class, 'store'])->name('comentarios.store');
    Route::get('/productos/{producto}/comentarios', [ComentarioController::class, 'index'])->name('comentarios.index');

   // Rutas de Perfil
    Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil.index'); // Mostrar perfil
    Route::get('/perfil/editar', [PerfilController::class, 'edit'])->name('perfil.edit'); // Formulario de edición
    Route::put('/perfil/actualizar', [PerfilController::class, 'update'])->name('perfil.update'); // Actualizar perfil

    Route::middleware('auth')->group(function () {
    Route::resource('carrito', CarritoController::class);
    Route::resource('favoritos', FavoritosController::class);
    Route::post('favoritos/toggle/{productoId}', [FavoritosController::class, 'toggle'])->name('favoritos.toggle');
    Route::resource('compras', ComprasController::class);
    Route::resource('envios', EnviosController::class);
    Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
    Route::post('/carrito/agregar/{producto}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
    Route::post('/carrito/toggle/{producto}', [CarritoController::class, 'toggle'])->name('carrito.toggle');
    Route::delete('/carrito/eliminar/{detalle}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
    Route::get('/pagar', [CarritoController::class, 'pagar'])->name('pagar');
    Route::post('/carrito/pagar-todo', [CarritoController::class, 'pagarTodo'])->name('pagar_todo');
    Route::post('/carrito/pagar-producto', [CarritoController::class, 'pagarProducto'])->name('pagar_producto');
});

    // Funcionalidades protegidas de encargos y contacto
    Route::post('/tienda/encargo', [EncargoController::class, 'store'])->name('encargo.store');
    Route::post('/enviar-contacto', [ContactoController::class, 'submit'])->name('contact.submit');
});

