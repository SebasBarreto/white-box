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
    <link href="{{ asset('css/home.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/switches.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>

<body>
@extends('layouts.app')

@section('content')
<div class="Dashb-wrapper">
    <div class="Dashb-container">
        <div class="Dashb-grid-container">
            <!-- Perfil -->
            <div class="Dashb-box">
                <h3 class="Dashb-h3">Perfil</h3>
                <p class="Dashb-p">Bienvenido, {{ Auth::user()->name }}</p>
                <p class="Dashb-p">Correo: {{ Auth::user()->email }}</p>
                <a href="{{ route('perfil.index') }}" class="Dashb-a">Editar perfil</a>
                
            </div>

            
        <div class="mt-8 Dashb-grid-container">
            <!-- Gráfico de Actividad -->
            <div class="Dashb-box">
                <h3 class="Dashb-h3">Actividad Reciente</h3>
                <canvas id="activityChart"></canvas>
            </div>

            <!-- Actividad Reciente -->
            <div class="Dashb-box">
                <h3 class="Dashb-h3">Última Actividad</h3>
                <table class="Dashb-table">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>10/12/2024</td>
                            <td>Compra realizada</td>
                            <td>Completado</td>
                        </tr>
                        <tr>
                            <td>08/12/2024</td>
                            <td>Producto agregado al carrito</td>
                            <td>Pendiente</td>
                        </tr>
                        <tr>
                            <td>05/12/2024</td>
                            <td>Producto marcado como favorito</td>
                            <td>Favorito</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

</body>
</html>
