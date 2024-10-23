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
    WB-Encargos
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
    <div class="c-formContainer">
        <div class="c-welcome">¡Bienvenido de nuevo!</div>
        <form method="POST" action="{{ route('login') }}" class="c-form">
            @csrf

            <!-- Email Address -->
            <div class="c-form__group">
                <label class="c-form__label" for="email">
                    <input type="email" id="email" class="c-form__input" placeholder=" " name="email" value="{{ old('email') }}" required autofocus>
                    <label class="c-form__next" for="progress2" role="button">
                        <span class="c-form__nextIcon"></span>
                    </label>
                    <span class="c-form__groupLabel">Introduce tu email</span>
                    <b class="c-form__border"></b>
                </label>
            </div>

            <!-- Password -->
            <div class="c-form__group">
                <label class="c-form__label" for="password">
                    <input type="password" id="password" class="c-form__input" placeholder=" " name="password" required>
                    <label class="c-form__next" for="finish" role="button">
                        <span class="c-form__nextIcon"></span>
                    </label>
                    <span class="c-form__groupLabel">Introduce tu contraseña</span>
                    <b class="c-form__border"></b>
                </label>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Recordarme') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif

                <x-primary-button class="ms-3">
                    {{ __('Iniciar sesión') }}
                </x-primary-button>
            </div>
        </form>
    </div>

@endsection
</body>
</html>

