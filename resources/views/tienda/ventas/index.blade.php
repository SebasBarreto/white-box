@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Categorías de Productos</h1>
    <div class="row">
        @foreach($categorias as $categoria)
            <div class="col-md-3 text-center">
                <a href="{{ route('ventas.categoria', $categoria->idcategoria) }}">
                    <div class="category-circle" style="background-image: url('/ruta/a/imagenes/{{ $categoria->imagen }}');">
                    </div>
                    <p>{{ $categoria->nombre }}</p>
                </a>
            </div>
        @endforeach
    </div>
</div>

<!-- shop section -->
<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Productos En Tienda</h2>
        </div>
        <div class="row">
            @foreach($productos as $producto)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box">
                    <a href="">
                        <div class="img-box">
                            <img src="/ruta/a/imagenes/{{ $producto->imagen }}" alt="{{ $producto->nombre }}">
                        </div>
                        <div class="detail-box">
                            <h6>{{ $producto->nombre }}</h6>
                            <h6>Price <span>${{ $producto->precio }}</span></h6>
                        </div>
                        <div class="new">
                            <span>New</span>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="btn-box">
            <a href="{{ route('ventas.index') }}" class="btn btn-primary">Ver todos los Productos</a>
        </div>
    </div>
</section>
<!-- end shop section -->
@endsection
