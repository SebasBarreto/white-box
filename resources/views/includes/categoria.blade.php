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
          <div class="box category-item"> <!-- Añadimos la clase category-item para el efecto de animación -->
            <a href="{{ route('articulos.categoria', $categoria->idcategoria) }}"> <!-- Redirige al artículo de la categoría seleccionada -->
              <div class="img-box">
                @if($categoria->nombre == 'componentes PC')
                  <img src="images/componentes_pc.png" alt="{{ $categoria->nombre }}">
                @elseif($categoria->nombre == 'Electrodomésticos')
                  <img src="images/electrodomesticos.jpg" alt="{{ $categoria->nombre }}">
                @elseif($categoria->nombre == 'Accesorios tecnológicos')
                  <img src="images/accesorios.png" alt="{{ $categoria->nombre }}">
                @elseif($categoria->nombre == 'Ropa y calzado')
                  <img src="images/ropa.png" alt="{{ $categoria->nombre }}">
                @elseif($categoria->nombre == 'Jugueteria')
                  <img src="images/jugueteria.png" alt="{{ $categoria->nombre }}">
                @elseif($categoria->nombre == 'Productos de belleza y cuidado personal')
                  <img src="images/belleza.png" alt="{{ $categoria->nombre }}">
                @elseif($categoria->nombre == 'Accesorios para automóviles')
                  <img src="images/carro.png" alt="{{ $categoria->nombre }}">
                @elseif($categoria->nombre == 'Utensilios de cocina')
                  <img src="images/cocina.png" alt="{{ $categoria->nombre }}">
                @elseif($categoria->nombre == 'Articulos de decoracion')
                  <img src="images/decoracion.png" alt="{{ $categoria->nombre }}">
                @elseif($categoria->nombre == 'Equipos de ejercicio en casa')
                  <img src="images/ejercicio.png" alt="{{ $categoria->nombre }}">
                @elseif($categoria->nombre == 'Artículos de decoración')
                  <img src="images/arte.png" alt="{{ $categoria->nombre }}">
                @else
                  <img src="images/default.jpg" alt="{{ $categoria->nombre }}">
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
