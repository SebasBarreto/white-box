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
    <link href="{{ asset('css/carrito.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/custom.js') }}?v={{ time() }}"></script>

</head>

<body>
    @extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <div class="header">
        <h1>Mi Caja</h1>
        @if (!$carrito->isEmpty())
            <form action="{{ route('pagar_todo') }}" method="POST" class="pay-all-form">
                @csrf
                <button type="submit" class="btn btn-success">Pagar Todo</button>
            </form>
        @endif
    </div>

    <div class="cart-grid">
        @foreach ($carrito as $detalle)
        <div class="card">
            <!-- Imagen del producto -->
            <div class="image_container categoria_detalle_img-box" 
    style="background-image: url('{{ asset('images/categoria/' . str_replace('-', '_', $detalle->producto->categoria->slug) . '/' . str_replace('-', '_', $detalle->producto->slug) . '/producto.png') }}')">
</div>

            

            <!-- Nombre del producto -->
            <div class="title">
                <span>{{ $detalle->producto->nombre }}</span>
            </div>

            <!-- Cantidad -->
            <div class="size">
                <span>Cantidad</span>
                <div class="value">
                    <span>{{ $detalle->cantidad }}</span>
                </div>
            </div>

            <!-- Subtotal -->
            <div class="price">
                <span>${{ number_format($detalle->subtotal, 2) }}</span>
            </div>

            <!-- Botón de comprar -->
            <div class="action">
                <form action="{{ route('pagar_producto', $detalle->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="cart-button">
                        <svg
                            class="cart-icon"
                            stroke="currentColor"
                            stroke-width="1.5"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"
                                stroke-linejoin="round"
                                stroke-linecap="round"
                            ></path>
                        </svg>
                        <span>Comprar</span>
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection   
</body>
</html>
