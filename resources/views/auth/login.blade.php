<!DOCTYPE html>
<html>
<head>
    <!-- Metadatos -->
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <title>White Box - Login</title>

    <!-- Estilos -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/switches.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" />
</head>

<body>
    @extends('layouts.app')

    @section('content')
    <div class="login-form">
        <h2 class="login-title">INICIAR SESIÓN</h2>

        <!-- Mensajes de estado de sesión -->
        @if (session('status'))
            <div class="session-status">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Login (Email o Teléfono) -->
            <div class="form-group">
                <label for="login" class="form-label">Correo Electrónico o Teléfono</label>
                <input id="login" type="text" name="login" value="{{ old('login') }}" required autofocus placeholder="Correo Electrónico o Teléfono" class="form-input">
                @error('login')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Contraseña -->
            <div class="form-group">
                <label for="password" class="form-label">Contraseña</label>
                <input id="password" type="password" name="password" required placeholder="Contraseña" class="form-input">
                @error('password')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Mantener sesión iniciada -->
            <div class="form-group flex justify-between">
                <label class="checkbox-container">
                    <input id="remember" type="checkbox" name="remember" class="form-checkbox">
                    <span class="checkbox-label">Mantener Sesión Iniciada</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="link-forgot-password">¿Olvidaste tu contraseña?</a>
                @endif
            </div>

            <!-- Botón de inicio de sesión -->
            <div class="form-group flex justify-between">
                <button type="submit" class="btn-primary">
                    Iniciar Sesión
                </button>
            </div>
        </form>

        <!-- Enlace a registro -->
        <div class="register-link text-center">
            <p class="register-text">¿No tienes cuenta? <a href="{{ route('register') }}" class="link-register">Regístrate aquí</a></p>
        </div>
    </div>
    @endsection
</body>
</html>
