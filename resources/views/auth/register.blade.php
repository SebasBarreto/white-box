<!DOCTYPE html>
<html>
<head>
    <!-- Metadatos -->
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <title>White Box - Registro</title>

    <!-- Estilos -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/switches.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/register.css') }}" rel="stylesheet" />
    <!-- Agregar el archivo JS -->
<script src="{{ asset('js/register.js') }}"></script>
</head>

<body>
    @extends('layouts.app')
    @section('content')
    <!-- Notificación de pantalla completa -->
    <div class="fullscreen-notification" id="notification">
        <div class="notification-content">
            <p>Este correo y/o número de celular ya está registrado en nuestra base de datos</p>
            <button class="notification-button" onclick="closeNotification()">Cerrar</button>
        </div>
    </div>

    <div class="register-form">
        <h2 class="register-title">REGISTRAR</h2>

        <form method="POST" action="{{ route('register') }}" id="registerForm">
            @csrf

            <!-- Nombre Completo -->
            <div class="form-group">
                <label for="name" class="form-label">Nombre Completo</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="Nombre Completo" class="form-input">
                @error('name')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Teléfono -->
            <div class="form-group">
                <label for="phone" class="form-label">Celular</label>
                <input id="phone" type="text" name="phone" value="{{ old('phone') }}" required pattern="3\d{9}" title="Debe empezar con 3 y tener 10 dígitos" placeholder="Celular" class="form-input">
                @error('phone')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Correo Electrónico -->
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required placeholder="Correo Electrónico" class="form-input" onblur="validateEmail()" onkeyup="checkEmailExists()">
                <p id="email_error" class="form-error" style="display: none;">Correo inválido. Verifique el formato.</p>
                <p id="email_error_exists" class="form-error" style="display: none;">Este correo ya está registrado.</p>
                @error('email')
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

            <!-- Confirmar Contraseña -->
            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required placeholder="Confirma Contraseña" class="form-input" onblur="validatePassword()">
                <p id="password_confirmation_error" class="form-error" style="display: none;">Las contraseñas no coinciden.</p>
                @error('password_confirmation')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Términos y Condiciones -->
            <div class="form-group flex justify-between {{ $errors->has('terms') ? 'error-border' : '' }}">
                <label class="checkbox-container" style="display: flex; align-items: center;">
                    <input type="checkbox" name="terms" required class="form-checkbox">
                    <span class="checkbox-label">Acepto los <a href="#" class="link-terms">términos y condiciones</a></span>
                </label>
                @error('terms')
                    <p class="form-error" style="color: #ff9900; font-size: 14px; margin-top: 5px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botón de Registro -->
            <div class="form-group flex justify-between">
                <button type="submit" class="btn-primary">
                    Registrar
                </button>
            </div>
        </form>

        <!-- Enlace a login -->
        <div class="login-link text-center">
            <p class="login-text">¿Ya tienes cuenta? <a href="{{ route('login') }}" class="link-login">Inicia Sesión aquí</a></p>
        </div>
    </div>
@endsection

</body>
</html>
