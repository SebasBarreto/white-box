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
    <h1>Mis Containers</h1>

    @if ($favoritos->isNotEmpty())
        <ul>
            @foreach ($favoritos as $favorito)
                <li>
                    <strong>Producto:</strong> {{ $favorito->producto->nombre }} <br>
                    <strong>Precio:</strong> ${{ $favorito->producto->precio }} <br>

                    <!-- Eliminar producto de favoritos -->
                    <form action="{{ route('favoritos.destroy', $favorito->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>No tienes productos en favoritos.</p>
    @endif
</div>
@endsection

</body>
</html>
