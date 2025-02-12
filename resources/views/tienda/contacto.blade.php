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
<form action="{{ route('contact.submit') }}" method="POST">
    @csrf
    <div class="input-field">
        <i class="fa fa-user"></i>
        <input type="text" name="name" placeholder="Nombre" required>
    </div>
    <div class="input-field">
        <i class="fa fa-phone"></i>
        <input type="text" name="phone" placeholder="Teléfono" required>
    </div>
    <div class="input-field">
        <i class="fa fa-envelope"></i>
        <input type="email" name="email" placeholder="Email" required>
    </div>
    <div class="input-field">
        <i class="fa fa-pencil"></i>
        <textarea name="message" placeholder="Mensaje" required></textarea>
    </div>
    <div class="btn-block">
        <button type="submit" class="btn">Enviar <i class="fa fa-paper-plane"></i></button>
    </div>
</form>

@endsection
</body>
</html>
