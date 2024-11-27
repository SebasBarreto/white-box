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
    <link href="{{ asset('css/home.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/switches.css') }}" rel="stylesheet" />
</head>

<body>

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Resultados de búsqueda para: "{{ $query }}"</h1>

        @if ($productos->isEmpty())
            <p>No se encontraron productos.</p>
        @else
            <ul>
                @foreach ($productos as $producto)
                    <li>
                        <a href="{{ route('producto.show', ['categoria_slug' => $producto->categoria->slug, 'producto_slug' => $producto->slug]) }}">
                            {{ $producto->nombre }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
</body>
</html>
