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
    <div class="container">
        <h1>Mis Envíos</h1>
    
        @if ($envios->isNotEmpty())
            <ul>
                @foreach ($envios as $envio)
                    <li>
                        <strong>Empresa de Envío:</strong> {{ $envio->empresa_envio }} <br>
                        <strong>Método:</strong> {{ $envio->metodo_envio }} <br>
                        <strong>Costo:</strong> ${{ $envio->costo_envio }} <br>
                        <strong>Fecha de Envío:</strong> {{ $envio->fecha_envio->format('d-m-Y') }} <br>
                        <strong>Fecha Estimada de Entrega:</strong> {{ $envio->fecha_estimada_entrega->format('d-m-Y') }}
                    </li>
                @endforeach
            </ul>
        @else
            <p>No hay envíos registrados.</p>
        @endif
    </div>
    @endsection
    
</body>
</html>
