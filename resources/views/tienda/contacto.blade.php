@extends('layouts.app')

@section('content')
<div class="contact-container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <section class="contact_section">
        <div class="contact-box" style="width: 100%; max-width: 450px; padding: 20px; background-color: rgba(255, 255, 255, 0.8); border-radius: 10px;">
            <h2>Contactanos <3</h2>
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
