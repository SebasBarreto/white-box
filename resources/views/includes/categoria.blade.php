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
                {{ $categoria->nombre }}
                <div class="img-box">
                  @if($categoria->nombre == 'componentes PC')
                    <img src="{{ asset('images/componentes_pc.png') }}" alt="{{ $categoria->nombre }}">
                  @elseif($categoria->nombre == 'Electrodomésticos')
                    <img src="{{ asset('images/electrodomesticos.jpg') }}" alt="{{ $categoria->nombre }}">
                  @elseif($categoria->nombre == 'Accesorios tecnológicos')
                    <img src="{{ asset('images/accesorios.png') }}" alt="{{ $categoria->nombre }}">
                  @elseif($categoria->nombre == 'Ropa y calzado')
                    <img src="{{ asset('images/ropa.png') }}" alt="{{ $categoria->nombre }}">
                  @elseif($categoria->nombre == 'Jugueteria')
                    <img src="{{ asset('images/jugueteria.png') }}" alt="{{ $categoria->nombre }}">
                  @elseif($categoria->nombre == 'Productos de belleza y cuidado personal')
                    <img src="{{ asset('images/belleza.png') }}" alt="{{ $categoria->nombre }}">
                  @elseif($categoria->nombre == 'Accesorios para automóviles')
                    <img src="{{ asset('images/carro.png') }}" alt="{{ $categoria->nombre }}">
                  @elseif($categoria->nombre == 'Utensilios de cocina')
                    <img src="{{ asset('images/cocina.png') }}" alt="{{ $categoria->nombre }}">
                  @elseif($categoria->nombre == 'Articulos de decoracion')
                    <img src="{{ asset('images/decoracion.png') }}" alt="{{ $categoria->nombre }}">
                  @elseif($categoria->nombre == 'Equipos de ejercicio en casa')
                    <img src="{{ asset('images/ejercicio.png') }}" alt="{{ $categoria->nombre }}">
                  @elseif($categoria->nombre == 'Artículos de decoración')
                    <img src="{{ asset('images/arte.png') }}" alt="{{ $categoria->nombre }}">
                  @else
                    <img src="{{ asset('images/default.jpg') }}" alt="{{ $categoria->nombre }}">
                  @endif
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

