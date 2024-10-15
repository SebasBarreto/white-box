<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'White Box')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- Aquí va tu barra de navegación -->
    <header class="header_section">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="{{ url('/') }}">White Box</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/ventas') }}">Ventas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/pre') }}">Pre-Venta</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/encargos') }}">Encargos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/contacto') }}">Contáctanos</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Aquí va el contenido específico de cada página -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>