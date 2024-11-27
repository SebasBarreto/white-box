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
    <link href="{{ asset('css/home.css') }}" rel="stylesheet" />
</head>

<body>
@extends('layouts.app')

@section('content')

<!-- shop section -->
<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Categorías de Productos</h2>
        </div>
        <div class="row">
            @foreach($categorias as $categoria)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box category-item">
                    <a href="{{ route('categoria.show', ['slug' => $categoria->slug]) }}">
                        <div class="img-box">
                            <img src="{{ asset('images/categoria/categorias/' . $categoria->slug . '.png') }}" alt="{{ $categoria->nombre }}">
                        </div>
                        <div class="detail-box">
                            <h6>{{ $categoria->nombre }}</h6>
                        </div>
                        <div class="new">
                            <span>New</span>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- end shop section -->

@endsection

</body>
</html>

