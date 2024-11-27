<nav class="navbar navbar-expand-lg custom_nav-container">
    <div class="navbar-content">
        <!-- Nombre centrado -->
        <a class="navbar-brand mx-auto" href="{{ url('/') }}">
            <span class="brand-text">White Box</span>
        </a>

        <!-- Contenedor de búsqueda -->
        <div class="search-and-cart">
            @unless(request()->routeIs('login'))
            <div class="input-field collapsed">
                <!-- Botón del SVG único -->
                <button type="button" class="search-toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="24" height="24" fill="#fff">
                        <path d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434zM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567zM7.5 9.933l-2.75 1.571v3.134l2.75-1.571zm1 3.134 2.75 1.571v-3.134L8.5 9.933zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567zm2.242-2.433V3.504L8.5 5.076V8.21zM7.5 8.21V5.076L4.75 3.504v3.134zM5.258 2.643 8 4.21l2.742-1.567L8 1.076zM15 9.933l-2.75 1.571v3.134L15 13.067zM3.75 14.638v-3.134L1 9.933v3.134z" />
                    </svg>
                </button>
        
                <!-- Formulario de búsqueda -->
                <form action="{{ route('buscar') }}" method="GET" class="search-form">
                    <input required name="text" type="text" class="search-input" placeholder="Buscar en White Box" />
                </form>
            </div>
            @endunless
        </div>        
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/') }}">Inicio</a>
            </li>
            <li class="nav-item {{ Request::is('categoria') || Request::is('ventas') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('ventas.index') }}">Categorias</a>
            </li>
            <li class="nav-item {{ Request::is('components/preventa') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('components/preventa') }}">Pre-Venta</a>
            </li>
            <li class="nav-item {{ Request::is('components/encargo') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('components/encargo') }}">Encargos Personalizados</a>
            </li>
            <li class="nav-item {{ Request::is('components/contacto') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('components/ofertas') }}">Ofertas</a>
            </li>
            <li class="nav-item {{ Request::is('components/contacto') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('components/contacto') }}">Contácto</a>
            </li>
        </ul>

        <div class="user_option">
            @if (Auth::check())
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>{{ Auth::user()->name }}</span>
                </a>
                <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    <span>Cerrar Sesión</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a class="nav-link" href="{{ route('login') }}">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>Iniciar Sesión</span>
                </a>
            @endif
        </div>
    </div>
</nav>
