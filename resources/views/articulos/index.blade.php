@extends('layouts.app')

@section('content')

<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>Artículos Disponibles</h2>
      </div>
      <div class="row">
        @foreach($articulos as $articulo)
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="{{ $articulo->imagen }}" alt="{{ $articulo->nombre }}">
              </div>
              <div class="detail-box">
                <h6>{{ $articulo->nombre }}</h6>
                <h6>Precio: ${{ $articulo->precio }}</h6>
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

@endsection
