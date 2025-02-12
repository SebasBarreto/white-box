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
    <link href="{{ asset('css/perfil.css') }}" rel="stylesheet" />
</head>

<body>
    @extends('layouts.app')

@section('title', 'Mi Perfil')

@section('content')
<div class="perfil-container">
    <div class="perfil-card">
        <h1 class="perfil-title">Mi Perfil</h1>

        <div class="perfil-info">
            <div class="perfil-info-item">
                <span class="perfil-label">Nombre:</span>
                <span class="perfil-value">{{ $cliente->nombre ?? 'N/A' }}</span>
            </div>
            <div class="perfil-info-item">
                <span class="perfil-label">Cédula:</span>
                <span class="perfil-value">{{ $cliente->cedula ?? 'N/A' }}</span>
            </div>
            <div class="perfil-info-item">
                <span class="perfil-label">Teléfono:</span>
                <span class="perfil-value">{{ $cliente->telefono ?? $usuario->phone ?? 'N/A' }}</span>
            </div>
            <div class="perfil-info-item">
                <span class="perfil-label">Dirección:</span>
                <span class="perfil-value">{{ $cliente->direccion ?? 'N/A' }}</span>
            </div>
            <div class="perfil-info-item">
                <span class="perfil-label">Ciudad:</span>
                <span class="perfil-value">{{ $cliente->ciudad ?? 'N/A' }}</span>
            </div>
            <div class="perfil-info-item">
                <span class="perfil-label">País:</span>
                <span class="perfil-value">{{ $cliente->pais ?? 'N/A' }}</span>
            </div>
            <div class="perfil-info-item">
                <span class="perfil-label">Correo Electrónico:</span>
                <span class="perfil-value">{{ $cliente->email ?? $usuario->email ?? 'N/A' }}</span>
            </div>
        </div>

        <div class="perfil-actions">
            <a href="{{ route('perfil.edit') }}" class="btn-edit">Editar Perfil</a>
        </div>
    </div>
</div>
@endsection

</body>
</html>
