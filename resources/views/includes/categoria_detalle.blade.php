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
    <link href="{{ asset('css/switches.css') }}" rel="stylesheet" />
</head>

<body>
    @extends('layouts.app')

    @section('title', 'Artículos en ' . $categoria->nombre)
    
    @section('content')
    <link rel="stylesheet" href="{{ asset('css/categoria_detalle.css') }}">
    
    <section class="categoria_detalle_section layout_padding">
        <div class="categoria_detalle_container">
            <div class="categoria_detalle_heading heading_center">
                <a href="{{ route('categoria.index') }}" class="categoria_detalle_back-link">Regresar a Categorías</a>
                <h2>{{ $categoria->nombre }}</h2>
            </div>
            
            <div class="row justify-content-center">
                @foreach($articulos as $articulo)
                <div class="col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
                    <div class="categoria_detalle_product-item">
                        <div class="categoria_detalle_img-box">
                          <img src="{{ asset('images/' . $articulo->imagen) }}" alt="{{ $articulo->nombre }}">
                        </div>
                        <div class="categoria_detalle_detail-box">
                          <h5>{{ $articulo->nombre }}</h5>
                          <div class="categoria_detalle_price-info">
                            @if($articulo->precio_anterior)
                                <span class="categoria_detalle_previous-price"><strong>Antes:</strong> ${{ number_format($articulo->precio_anterior, 2) }}</span>
                                <span class="categoria_detalle_current-price"><strong>Ahora:</strong> ${{ number_format($articulo->precio, 2) }}</span>
                            @else
                                <span class="categoria_detalle_current-price">${{ number_format($articulo->precio, 2) }}</span>
                            @endif
                        </div>
                        </div>
                        <a href="#" class="categoria_detalle_btn-add-to-cart">Añadir a la caja</a>
                      </div>
                      
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endsection
    </body>
    </html>
    