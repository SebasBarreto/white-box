@extends('layouts.app')

@section('content')
<h1>Categorías</h1>
<div class="categories-container">
    @foreach($categorias as $categoria)
        <a href="{{ route('ventas', $categoria->idcategoria) }}">
            <div class="category-item">
                <img src="path_to_image_for_category" alt="{{ $categoria->nombre }}">
                <p>{{ $categoria->nombre }}</p>
            </div>
        </a>
    @endforeach
</div>
@endsection
