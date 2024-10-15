<nav class="navbar navbar-expand-lg custom_nav-container ">
    <a class="navbar-brand" href="{{ url('/') }}">
      <span>
        White Box
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav  ">
        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/') }}">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('ventas.index') }}">Ventas</a>
        </li>
        </li>
        <li class="nav-item {{ Request::is('tienda/pre') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('tienda/pre') }}">Pre-Venta</a>
        </li>
        </li>
        <li class="nav-item">
            <li class="nav-item {{ Request::is('tienda/encargo') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('tienda/encargo') }}">Encargos</a>
            </li>
        </li>
        <li class="nav-item {{ Request::is('tienda/contacto') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('tienda/contacto') }}">Contactanos</a>
        </li>
      </ul>
      <div class="user_option">
        <a href="">
          <i class="fa fa-user" aria-hidden="true"></i>
          <span>
            Iniciar Sección
          </span>
        </a>
        <a href="">
          <i class="fa fa-shopping-bag" aria-hidden="true"></i>
        </a>
        <form class="form-inline ">
          <button class="btn nav_search-btn" type="submit">
            <i class="fa fa-search" aria-hidden="true"></i>
          </button>
        </form>
      </div>
    </div>
</nav>
