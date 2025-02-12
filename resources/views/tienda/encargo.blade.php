<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

    <title>
        White Box
    </title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/switches.css') }}" rel="stylesheet" />
</head>

<body>
    @extends('layouts.app')

    @section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>
    
    <div class="container">
        <div class="form-container with-icons">
            <h1>Formulario de Encargos</h1>
            <form action="{{ route('encargo.store') }}" method="POST">
                @csrf
                <!-- Nombre del producto -->
                <div class="form-group">
                    <label for="producto">Nombre del producto</label>
                    <input type="text" name="producto" placeholder="Nombre del producto" required>
                </div>
    
                <!-- Cantidad -->
                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" name="cantidad" placeholder="Cantidad" required>
                </div>
    
                <!-- Descripción -->
                <div class="form-group">
                    <label for="descripcion">Descripción del producto</label>
                    <textarea name="descripcion" placeholder="Descripción del producto"></textarea>
                </div>
    
                <!-- Elige el transporte -->
                <h3>Elige el transporte</h3>
                <div class="transport-switches">
                    <!-- Botón de Avión a la izquierda -->
                    <label class="switch-avion" for="radio-plane">
                        <input id="radio-plane" type="radio" name="transporte" value="avion" checked>
                        <div class="icon-container">
                            <img src="{{ asset('images/avion.png') }}" alt="Avión" class="transport-icon">
                            <span>Avión</span>
                        </div>
                    </label>
                
                    <!-- Botón de Barco a la derecha -->
                    <label class="switch-barco" for="radio-ship">
                        <input id="radio-ship" type="radio" name="transporte" value="barco">
                        <div class="icon-container">
                            <img src="{{ asset('images/barco.png') }}" alt="Barco" class="transport-icon">
                            <span>Barco</span>
                        </div>
                    </label>
                
                    <!-- Texto en el centro -->
                    <div class="transport-details">
                        <p id="transport-info" class="transport-info">Más rápido, pero más caro</p>
                    </div>
                </div>
                
                
                
                
            <!-- Texto que aparecerá dinámicamente al seleccionar el transporte -->
    <div class="transport-details">
        <p id="avion-info" class="transport-info" style="display: none;">Más rápido, pero más caro</p>
        <p id="barco-info" class="transport-info" style="display: none;">Más lento, pero más barato</p>
    </div>
    
                <!-- Lugar de destino -->
                <div class="form-group">
                    <label for="destino">Lugar de destino</label>
                    <input type="text" name="origen" placeholder="Lugar de destino" required>
                </div>
    
                <!-- Email de contacto -->
                <div class="form-group">
                    <label for="email">Tu correo electrónico</label>
                    <input type="email" name="email" placeholder="Tu correo electrónico" required>
                </div>
    
                <!-- Botón para cotizar -->
                <button type="submit">Cotizar</button>
            </form>
        </div>
    </div>
    
    <link rel="stylesheet" href="{{ asset('css/switches.css') }}">
    @endsection
</body>
</html>
