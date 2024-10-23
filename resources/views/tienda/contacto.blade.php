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
    WB-Contacto
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
<div class="contact-container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <section class="contact_section">
        <div class="contact-box" style="width: 100%; max-width: 450px; padding: 20px; background-color: rgba(255, 255, 255, 0.8); border-radius: 10px;">
            <h2>Contactanos</h2>
            <form action="/enviar-contacto" method="POST">
                @csrf
                <div class="input-field">
                    <i class="fa fa-user"></i>
                    <input type="text" name="nombre" placeholder="Nombre" required>
                </div>
                <div class="input-field">
                    <i class="fa fa-phone"></i>
                    <input type="text" name="telefono" placeholder="Teléfono" required>
                </div>
                <div class="input-field">
                    <i class="fa fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-field">
                    <i class="fa fa-pencil"></i>
                    <textarea name="mensaje" placeholder="Mensaje" required></textarea>
                </div>
                <div class="btn-block">
                    <button type="submit" class="btn">Enviar <i class="fa fa-paper-plane"></i></button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
</body>
</html>
