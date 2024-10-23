<nav class="navbar navbar-expand-lg custom_nav-container">
  <a class="navbar-brand" href="{{ url('/') }}">
      <span>White Box</span>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
          <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('/') }}">Inicio</a>
          </li>
          <li class="nav-item {{ Request::is('categoria') || Request::is('ventas') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('ventas.index') }}">Ventas</a>
          </li>
          <li class="nav-item {{ Request::is('tienda/pre') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('tienda/pre') }}">Pre-Venta</a>
          </li>
          <li class="nav-item {{ Request::is('tienda/encargo') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('tienda/encargo') }}">Encargos</a>
          </li>
          <li class="nav-item {{ Request::is('tienda/contacto') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('tienda/contacto') }}">Contáctanos</a>
          </li>
      </ul>

      <div class="user_option">
          @if (Auth::check())
              <!-- Mostrar opciones para usuarios autenticados -->
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
              <!-- Mostrar opciones para usuarios no autenticados -->
              <a class="nav-link" href="{{ route('login') }}">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <span>Iniciar Sesión</span>
              </a>
              <a class="nav-link" href="{{ route('register') }}">
                  <i class="fa fa-user-plus" aria-hidden="true"></i>
                  <span>Registrarse</span>
              </a>
          @endif

          <!-- Icono de carrito de compras -->
          <a href="">
              <i class="fa fa-shopping-bag" aria-hidden="true"></i>
          </a>

          <!-- Barra de búsqueda -->
          <form class="form-inline">
              <button class="btn nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
              </button>
          </form>
      </div>
  </div>
</nav>