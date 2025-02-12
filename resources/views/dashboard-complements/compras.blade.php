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
        <h1>Mis Compras</h1>
    
        @if ($compras->isNotEmpty())
            <ul>
                @foreach ($compras as $compra)
                    <li>
                        <strong>Producto:</strong> {{ $compra->producto->nombre }} <br>
                        <strong>Cantidad:</strong> {{ $compra->cantidad }} <br>
                        <strong>Total:</strong> ${{ $compra->total }} <br>
                        <strong>Fecha de Compra:</strong> {{ $compra->fecha_compra->format('d-m-Y') }}
                    </li>
                @endforeach
            </ul>
        @else
            <p>No has realizado ninguna compra.</p>
        @endif
    </div>
    @endsection
    
</body>
</html>
