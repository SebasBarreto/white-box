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

@section('content')
<div class="container">
    <h1>Editar Perfil</h1>
    <form action="{{ route('perfil.update') }}" method="POST">
        @csrf
        @method('PUT') <!-- Campo oculto para indicar que es una solicitud PUT -->

        <!-- Campo: Dirección -->
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" id="direccion" class="form-control" 
                   value="{{ old('direccion', $cliente->direccion ?? '') }}" required>
        </div>

        <!-- Campo: Ciudad -->
        <div class="form-group">
            <label for="ciudad">Ciudad</label>
            <input type="text" name="ciudad" id="ciudad" class="form-control" 
                   value="{{ old('ciudad', $cliente->ciudad ?? '') }}" required>
        </div>

        <!-- Campo: País -->
        <div class="form-group">
            <label for="pais">País</label>
            <input type="text" name="pais" id="pais" class="form-control" 
                   value="{{ old('pais', $cliente->pais ?? '') }}" required>
        </div>

        <!-- Campo: Cédula -->
        <div class="form-group">
            <label for="cedula">Cédula</label>
            <input type="text" name="cedula" id="cedula" class="form-control" 
                   value="{{ old('cedula', $cliente->cedula ?? '') }}" 
                   {{ $cliente && $cliente->cedula ? 'readonly' : '' }}>
            @if (!$cliente || !$cliente->cedula)
                <medium class="text-muted">No se podrá modificar después de ser guardada.</medium>
            @endif
        </div>

        <button type="submit" class="btn btn-success">Actualizar Perfil</button>
    </form>
</div>
@endsection

    
    
</body>
</html>
