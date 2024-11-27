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
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/switches.css') }}" />

    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.js') }}"></script>

    <!-- Custom JavaScript -->
    <script src="{{ asset('js/custom.js') }}"></script>

    
</head>

<body>
    @extends('layouts.app')

    @section('title', $producto->nombre)
    
    @section('content')
    <link rel="stylesheet" href="{{ asset('css/producto_detalle.css') }}">
    
    <!-- Breadcrumb -->
<nav class="breadcrumb">
    <a href="{{ route('home') }}">Inicio</a> |
    <a href="{{ route('categoria.show', ['slug' => $categoria->slug]) }}">{{ $categoria->nombre }}</a> |
    <span>{{ $producto->nombre }}</span>
</nav>

    
    
    
    <div class="product-container">
        <!-- Sección de producto -->
        <div class="product-card">
            <div class="flex-container">
                <!-- Columna izquierda -->
                <div class="column left-column">
                    <div class="producto_detalle_imagenes">
                        <!-- Imagen principal -->
                        <div class="image-container">
                            <!-- Imagen principal -->
                            <div class="zoom-area">
                                <img id="mainImg" src="{{ asset('images/categoria/' . str_replace('-', '_', $categoria->slug) . '/' . str_replace('-', '_', $producto->slug) . '/producto.png') }}" alt="{{ $producto->nombre }}">
                            </div>
                        
                            <!-- Zoom oculto inicialmente -->
                            <div class="zoom-preview" id="zoomPreview"></div>
                        </div> 
                        
                        <!-- Miniaturas del producto -->
                        <div class="mini-images">
                            <img src="{{ asset('images/categoria/' . str_replace('-', '_', $categoria->slug) . '/' . str_replace('-', '_', $producto->slug) . '/producto.png') }}" 
                            alt="imagen-container"
                            <img src="{{ asset('images/categoria/' . str_replace('-', '_', $categoria->slug) . '/' . str_replace('-', '_', $producto->slug) . '/producto.png') }}" 
                            alt="Imagen Principal"
                            class="mini-img" 
                            onclick="changeImage(this)">
                            @for ($i = 1; $i <= 10; $i++)
                                @php
                                    $miniImagePath = 'images/categoria/' . str_replace('-', '_', $categoria->slug) . '/' . str_replace('-', '_', $producto->slug) . '/imagen' . $i . '.png';
                                @endphp
                                @if (file_exists(public_path($miniImagePath)))
                                    <img src="{{ asset($miniImagePath) }}" alt="Miniatura {{ $i }}" class="mini-img" onclick="changeImage(this)">
                                @endif
                            @endfor
                        </div>                        
                    </div>
                    <div class="stock">
                        <h3>Stock</h3>
                        @if($producto->stock > 10)
                            <p style="color: green;">Disponible: {{ $producto->stock }} unidades</p>
                        @elseif($producto->stock > 0 && $producto->stock <= 10)
                            <p style="color: orange;">Quedan pocas unidades: {{ $producto->stock }}</p>
                        @else
                            <p style="color: red;">Agotado</p>
                        @endif
                    </div>
                </div>    
                <!-- Columna central -->
                <div class="column center-column">
                    <h1>{{ $producto->nombre }}</h1>
                    <div class="atributos-container">
                        <h3>Atributos:</h3>
                        @foreach ($producto->atributos as $atributo)
                        <div class="atributo-grupo">
                            <strong>{{ $atributo->atributo->nombre }}:</strong>
                            <div class="atributo-botones">
                                @foreach ($atributo->atributo->valores as $valor)
                                    <button type="button" 
                                            class="atributo-boton {{ strtolower($atributo->atributo->nombre) == 'color' ? 'color-boton' : '' }} {{ $valor->valor == 'unica' || $valor->valor == 'negro' ? 'seleccionado' : '' }}" 
                                            data-color="{{ strtolower($valor->valor) }}" 
                                            onclick="selectAtributo('{{ $atributo->atributo->nombre }}', '{{ $valor->valor }}', this)"
                                            {{ in_array($valor->valor, ['unica', 'negro']) ? 'disabled' : '' }}>
                                        {{ $valor->valor }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    </div>                  
                </div>    
                <!-- Columna derecha -->
                <div class="column right-column">
                    <div class="payment-methods">
                        <h3>Métodos de Pago</h3>
                        <ul>
                            <li>Pago contra entrega</li>
                            <li>Transferencias bancarias</li>
                            <li>Tarjetas</li>
                        </ul>
                        
                        <h3> Envios </h3> 
                        <ul>                           
                            <li>Envíos nacionales e internacionales</li>
                        </ul>
                    </div>
                    <!-- Sección de precio -->
                    <div class="price-section">
                        <h4>Precio: ${{ number_format($producto->precio, 2) }}</h4>
                    </div>
                    <div class="quantity">
                        <button class="btn-quantity" onclick="decreaseQuantity()">-</button>
                        <input type="number" id="quantity" min="1" max="{{ $producto->stock }}" value="1">
                        <button class="btn-quantity" onclick="increaseQuantity()">+</button>
                    </div>
                    
                    <div class="actions">
                        <button class="btn btn-primary">Comprar Ahora</button>
                        <button class="btn btn-secondary">Añadir al Carrito</button>
                        <button class="btn btn-favorite">Añadir a Favoritos</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-container">
            <!-- Contenedor padre para alinear Características y Descripción -->
            <div class="split-container">
                <!-- Características -->
                <div class="split-section">
                    <h3>Características:</h3>
                    @if (!empty($producto->caracteristicas))
                        <ul>
                            @foreach ($producto->caracteristicas as $clave => $valor)
                                <li>
                                    <strong>{{ ucfirst(str_replace('_', ' ', $clave)) }}:</strong>
                                    {{ is_bool($valor) ? ($valor ? 'Sí' : 'No') : $valor }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>Este producto no tiene características disponibles.</p>
                    @endif
                </div>            
                <!-- Descripción -->
                <div class="split-section">
                    <h3>Descripción</h3>
                    <div>
                    <div class="content" id="descripcion-content">
                        <p>{{$producto->descripcion}}</p>
                    </div>
                    </div>
                    <button class="toggle-btn" onclick="toggleContent()">Leer más</button>
                </div>                
            </div>
        </div>
            <!-- Segunda columna: Comentarios y Productos Relacionados -->
            <div class="split-container-bottom">
                <!-- Comentarios -->
                <div class="product-card comments-card">
                    <h3>Comentarios</h3>
                    <div class="scrollable-content">
                        <form action="#" method="POST">
                            @csrf
                            <textarea name="comentario" placeholder="Escribe tu comentario"></textarea>
                            <button class="btn btn-comment" type="submit">Enviar</button>
                        </form>
                    </div>
                </div>
                <!-- Productos Relacionados -->
                <div class="product-card related-products-card">
                    <h3>Productos Relacionados</h3>
                    <div class="scrollable-horizontal">
                        @foreach($productosRelacionados as $relacionado)
                            <div class="related-item">
                                <a href="{{ route('producto.detalle', ['categoria_slug' => $categoria->slug, 'producto_slug' => $relacionado->slug]) }}">
                                    <img src="{{ asset('images/categoria/' . str_replace('-', '_', $categoria->slug) . '/' . str_replace('-', '_', $relacionado->slug) . '/producto.png') }}" alt="{{ $relacionado->nombre }}">
                                    <p>{{ $relacionado->nombre }}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>            
        </div>                               
    @endsection
    

    </body>
    </html>
    