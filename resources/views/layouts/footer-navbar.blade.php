<!-- Carga de estilos -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="{{ asset('css/footer-navbar.css') }}" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<div class="fixed-navbar">
    <div class="logo">
        <i class="fa-brands fa-the-red-yeti"></i>
    </div>
    <ul class="navbar-menu">
        <!-- Ícono de Perfil -->
        <li class="icon-content">
            <a href="{{ route('perfil.index') }}" class="navbar-item" data-social="perfil">
                <i class="bi bi-person-vcard"></i>
                <div class="filled"></div>
                <span class="menu-text">Perfil</span>
            </a>
            <div class="tooltip">Perfil</div>
        </li>

        <!-- Ícono de Compras -->
        <li class="icon-content">
            <a href="{{ route('compras.index') }}" class="navbar-item" data-social="compras">
                <i class="bi bi-cash-coin"></i>
                <div class="filled"></div>
                <span class="menu-text">Compras</span>
            </a>
            <div class="tooltip">Compras</div>
        </li>

        <!-- Ícono de Favoritos -->
        <li class="icon-content">
            <a href="{{ route('favoritos.index') }}" class="navbar-item" data-social="favoritos">
                <i class="bi bi-balloon-heart"></i>
                <div class="filled"></div>
                <span class="menu-text">Favoritos</span>
            </a>
            <div class="tooltip">Favoritos</div>
        </li>

        <!-- Ícono de Carrito -->
        <li class="icon-content">
            <a href="{{ route('carrito.index') }}" class="navbar-item" data-social="carrito">
                <i class="bi bi-box-seam-fill"></i>
                <div class="filled"></div>
                <span class="menu-text">Carrito</span>
            </a>
            <div class="tooltip">Carrito</div>
        </li>

        <!-- Ícono de Envíos -->
        <li class="icon-content">
            <a href="{{ route('envios.index') }}" class="navbar-item" data-social="envios">
                <i class="bi bi-airplane-engines"></i>
                <div class="filled"></div>
                <span class="menu-text">Envíos</span>
            </a>
            <div class="tooltip">Envíos</div>
        </li>

        <!-- Ícono de Logout -->
        <li class="icon-content">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="navbar-item logout" data-social="logout">
                <i class="bi bi-door-open-fill"></i>
                <div class="filled"></div>
                <span class="menu-text">Logout</span>
            </a>
            <div class="tooltip">Cerrar Sesion</div>
        </li>
    </ul>
</div>