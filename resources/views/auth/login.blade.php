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
    WB-Encargos
    </title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/_variables.css') }}">
    <link href="{{ asset('css/switches.css') }}" rel="stylesheet" />
</head>

<body>
@extends('layouts.app')

@section('content')
<div class="custom-container" id="custom-container">
    <div class="custom-form-container custom-sign-up-container">
        <form action="{{ route('register') }}" method="POST">
			@csrf
            <h1>Crear Cuenta</h1>
            <input type="text" placeholder="Nombre" required />
            <input type="email" placeholder="Correo" required />
            <input type="tel" placeholder="Número de Teléfono" required pattern="[0-9]{10}" />
            <input type="password" id="password" placeholder="Contraseña" required />
            <!-- Términos y condiciones -->
            <div class="terms-container">
                <input type="checkbox" id="terms" required />
                <label for="terms">Autorizo el uso de mis datos en los siguientes <a href="#">términos y condiciones</a></label>
            </div>

            <button type="submit" id="registerButton">Registrarse</button>
        </form>
    </div>
    <div class="custom-form-container custom-sign-in-container">
        <form action="{{ route('login') }}" method="POST">
			@csrf
            <h1>Iniciar Sesión</h1>
            <input type="email" placeholder="Correo" />
            <input type="password" placeholder="Contraseña" />
            <a href="#" class="forgot-password">¿Olvidaste tu contraseña?</a>
            <button>Iniciar Sesión</button>
        </form>
    </div>
    <div class="custom-overlay-container">
        <div class="custom-overlay">
            <div class="custom-overlay-panel custom-overlay-left">
                <h1>Bienvenido Nuevamente a White Box!</h1>
                <p>Para mantenerte conectado con nosotros, inicia sesión con tu información personal.</p>
                <button class="custom-ghost" id="custom-signIn">Iniciar Sesión</button>
            </div>
            <div class="custom-overlay-panel custom-overlay-right">
                <h1>¡Bienvenido a White Box!</h1>
                <p>Traemos lo mejor de EE.UU, Asia, Europa, China hasta ti. Ingresa tus datos y comienza a comprar y/o recibir productos exclusivos con nosotros.</p>
                <button class="custom-ghost" id="custom-signUp">Registrarse</button>
            </div>
        </div>
    </div>
</div>
@endsection
</body>
</html>

