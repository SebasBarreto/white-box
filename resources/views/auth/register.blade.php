@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Registro</h2>
    <form class="row g-3" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="col-md-6">
            <label for="name" class="form-label">Nombre Completo</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese su nombre completo" required>
        </div>
        <div class="col-md-6">
            <label for="username" class="form-label">Nombre de Usuario</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Ingrese su nombre de usuario" required>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su email" required>
        </div>
        <div class="col-md-6">
            <label for="phone" class="form-label">Número de Teléfono</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Ingrese su número de teléfono">
        </div>
        <div class="col-md-6">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña" required>
        </div>
        <div class="col-md-6">
            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirme su contraseña" required>
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                <label class="form-check-label" for="terms">
                    Acepto los <a href="#">términos y condiciones</a>
                </label>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </div>
    </form>
</div>
@endsection
