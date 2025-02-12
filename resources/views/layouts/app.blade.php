<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'White Box')</title>

    <!-- Fonts y Estilos -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/background.css') }}">
</head>
<body>
    <!-- Fondo -->
    <div 
        class="hexagon-background" 
        style="
            background-image: url('{{ asset(getBackgroundImage()) }}');
        ">
    </div>

    <!-- Navegación -->
    @include('layouts.navigation')

    <!-- Contenido Principal -->
    <div class="content-wrapper">
        @yield('content')
    </div>

    <!-- Footer -->
    @include('includes.info')

    <!-- Footer Navbar (si está autenticado) -->
    @auth
        @include('layouts.footer-navbar')
    @endauth

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('js/custom.js') }}?v={{ time() }}"></script>
</body>
</html>
