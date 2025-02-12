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
                <!-- Columna derecha -->
                <div class="column right-column">
                    <div class="actions">
                        <h4 class="price">Precio: ${{ number_format($producto->precio, 2) }}</h4>
                        
                            <div class="quantity-control">
                            <button class="btn-quantity decrease" onclick="decreaseQuantity()">-</button>
                            <input type="number" id="quantity" min="1" max="{{ $producto->stock }}" value="1">
                            <button class="btn-quantity increase" onclick="increaseQuantity()">+</button>
                            </div>
                        
                            <div class="action-buttons">
                            <!-- Botón Comprar Ahora -->
                            <button class="btn btn-primary" onclick="location.href='/comprar/{{ $producto->id }}'">
                                Comprar Ahora
                            </button>
                        
                            <!-- Botón Añadir al Carrito -->
                            <button class="btn btn-secondary cart-btn" 
                                    onclick="event.stopPropagation(); toggleCarrito({{ $producto->id }}, this)" 
                                    data-active="{{ $producto->en_carrito ? 'true' : 'false' }}">
                                <svg 
                                class="cart-icon" 
                                xmlns="http://www.w3.org/2000/svg" 
                                viewBox="0 0 24 24" 
                                fill="{{ $producto->en_carrito ? '#ee4e2c' : 'gray' }}" 
                                width="20" 
                                height="20">
                                <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003zM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461z"/>
                                </svg>
                                Añadir a Caja
                            </button>
                        
                            <!-- Botón Añadir a Favoritos -->
                            <button class="btn btn-favorite wishlist-btn" 
                                    onclick="toggleFavorito({{ $producto->id }}, this)"
                                    data-active="{{ $producto->es_favorito ? 'true' : 'false' }}">
                                <svg 
                                xmlns="http://www.w3.org/2000/svg" 
                                width="20" 
                                height="20" 
                                fill="{{ $producto->es_favorito ? '#ee4e2c' : 'gray' }}" 
                                class="heart-icon" 
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="m8 2.42-.717-.737c-1.13-1.161-3.243-.777-4.01.72-.35.685-.451 1.707.236 3.062C4.16 6.753 5.52 8.32 8 10.042c2.479-1.723 3.839-3.29 4.491-4.577.687-1.355.587-2.377.236-3.061-.767-1.498-2.88-1.882-4.01-.721zm-.49 8.5c-10.78-7.44-3-13.155.359-10.063q.068.062.132.129.065-.067.132-.129c3.36-3.092 11.137 2.624.357 10.063l.235.468a.25.25 0 1 1-.448.224l-.008-.017c.008.11.02.202.037.29.054.27.161.488.419 1.003.288.578.235 1.15.076 1.629-.157.469-.422.867-.588 1.115l-.004.007a.25.25 0 1 1-.416-.278c.168-.252.4-.6.533-1.003.133-.396.163-.824-.049-1.246l-.013-.028c-.24-.48-.38-.758-.448-1.102a3 3 0 0 1-.052-.45l-.04.08a.25.25 0 1 1-.447-.224l.235-.468ZM6.013 2.06c-.649-.18-1.483.083-1.85.798-.131.258-.245.689-.08 1.335.063.244.414.198.487-.043.21-.697.627-1.447 1.359-1.692.217-.073.304-.337.084-.398"/>
                                </svg>
                                Añadir a Container
                            </button>
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
                        @foreach(json_decode($producto->caracteristicas, true) as $key => $value)
                            <li><strong>{{ ucfirst($key) }}:</strong> {{ $value }}</li>
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
                        <!-- Mostrar comentarios -->
                        @foreach ($comentarios as $comentario)
                            <div class="comentario">
                                <strong>{{ $comentario->usuario->name }}</strong>
                                <p>{{ $comentario->comentario }}</p>
                                <small>{{ $comentario->created_at->format('d-m-Y H:i') }}</small>
                            </div>
                        @endforeach
                
                        <!-- Formulario para agregar comentarios -->
                        @auth
                            <form action="{{ route('comentarios.store', $producto->id) }}" method="POST">
                                @csrf
                                <textarea name="comentario" placeholder="Escribe tu comentario"></textarea>
                                <button type="submit" class="btn btn-comment">Enviar</button>
                            </form>
                        @else
                            <p>Debes iniciar sesión para comentar.</p>
                        @endauth
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
    </div>             
    </div>         
    @endsection
    </body>
    </html>
    