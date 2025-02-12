<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('getBackgroundImage')) {
    function getBackgroundImage()
    {
        // Fondos específicos para las nuevas vistas
        switch (Route::currentRouteName()) {
            case 'perfil.index':
                return 'images/categoria/dashboard/fondo-perfil.png';
            case 'compras.index':
                return 'images/categoria/dashboard/fondo-compras.png';
            case 'carrito.index':
                return 'images/categoria/dashboard/fondo-carrito.png';
            case 'envios.index':
                return 'images/categoria/dashboard/fondo-envios.png';
            case 'favoritos.index':
                return 'images/categoria/dashboard/fondo-favoritos.png';
            default:
                // Ruta predeterminada para otras vistas
                return 'images/categoria/home/hexagon-background.png';
        }
    }
}
