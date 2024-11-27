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

    @section('title', 'Productos en ' . $categoria->nombre)
    
    @section('content')
    <link rel="stylesheet" href="{{ asset('css/categoria_detalle.css') }}">
    
    <section class="categoria_detalle_section layout_padding">
        <div class="categoria_detalle_container">
            <!-- Encabezado con enlace de regreso a categorías -->
            <div class="categoria_detalle_heading heading_center">
                <a href="{{ route('categoria.index') }}" class="categoria_detalle_back-link">Regresar a Categorías</a>
                <h2>{{ $categoria->nombre }}</h2>
            </div>
            
            <!-- Productos de la categoría -->
            <div class="row justify-content-center">
                @foreach($productos as $producto)
                <div class="col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
                    <div class="categoria_detalle_product-card" onclick="window.location.href='{{ route('producto.detalle', ['categoria_slug' => $categorySlug, 'producto_slug' => $producto->slug]) }}'">
                        <!-- Imagen del producto -->
                        <div class="categoria_detalle_img-box" style="background-image: url('{{ asset('images/categoria/' . str_replace('-', '_', $categorySlug) . '/' . str_replace('-', '_', $producto->slug) . '/producto.png') }}')">
                        </div>                                                                       
                        
                        <!-- Detalles del producto debajo de la imagen -->
                        <div class="categoria_detalle_info">
                            <h5>{{ $producto->nombre }}</h5>
                            <div class="categoria_detalle_price-info">
                                @if($producto->precio_anterior)
                                    <span class="categoria_detalle_previous-price">Antes: ${{ number_format($producto->precio_anterior, 2) }}</span>
                                @endif
                                <span class="categoria_detalle_current-price">Ahora: ${{ number_format($producto->precio, 2) }}</span>
                            </div>
                            
                            <!-- Línea inferior con botones -->
                            <div class="categoria_detalle_action-bar">
                                <!-- Botón de favoritos -->
                                <button 
                                    class="wishlist-btn" 
                                    onclick="event.stopPropagation(); toggleFavorito({{ $producto->id }}, this)" 
                                    data-active="{{ $producto->es_favorito ? 'true' : 'false' }}"
                                >
                                    <svg 
                                        xmlns="http://www.w3.org/2000/svg" 
                                        width="24" 
                                        height="24" 
                                        fill="{{ $producto->es_favorito ? 'red' : 'gray' }}" 
                                        class="heart-icon" 
                                        viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="m8 2.42-.717-.737c-1.13-1.161-3.243-.777-4.01.72-.35.685-.451 1.707.236 3.062C4.16 6.753 5.52 8.32 8 10.042c2.479-1.723 3.839-3.29 4.491-4.577.687-1.355.587-2.377.236-3.061-.767-1.498-2.88-1.882-4.01-.721zm-.49 8.5c-10.78-7.44-3-13.155.359-10.063q.068.062.132.129.065-.067.132-.129c3.36-3.092 11.137 2.624.357 10.063l.235.468a.25.25 0 1 1-.448.224l-.008-.017c.008.11.02.202.037.29.054.27.161.488.419 1.003.288.578.235 1.15.076 1.629-.157.469-.422.867-.588 1.115l-.004.007a.25.25 0 1 1-.416-.278c.168-.252.4-.6.533-1.003.133-.396.163-.824-.049-1.246l-.013-.028c-.24-.48-.38-.758-.448-1.102a3 3 0 0 1-.052-.45l-.04.08a.25.25 0 1 1-.447-.224l.235-.468ZM6.013 2.06c-.649-.18-1.483.083-1.85.798-.131.258-.245.689-.08 1.335.063.244.414.198.487-.043.21-.697.627-1.447 1.359-1.692.217-.073.304-.337.084-.398"/>
                                    </svg>
                                </button>
        
                                <!-- Botón de carrito -->
                                <button 
    class="cart-btn" 
    onclick="event.stopPropagation(); toggleCarrito({{ $producto->id }}, this)" 
    data-active="{{ $producto->en_carrito ? 'true' : 'false' }}"
>
    <svg 
        class="cart-icon" 
        xmlns="http://www.w3.org/2000/svg" 
        viewBox="0 0 24 24" 
        fill="{{ $producto->en_carrito ? '#e4e72c' : 'gray' }}" 
        width="24" 
        height="24"
    >
    <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003zM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461z"/>
    </svg>
</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endsection
    
    
    </body>
    </html>
    