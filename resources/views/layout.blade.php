<!-- resources/views/layout.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <!-- CSS y otros archivos estáticos -->
</head>
<body>
    <!-- header section strats -->
    <header class="header_section">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>
              White Box
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
          </button>
  
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item active">
                <a class="nav-link" href="index.html">Inicio <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ventas.html">
                  Ventas
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pre.html">
                  Pre-Venta
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="encargo.html">
                  Encargos
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contacto.html">Contactanos</a>
              </li>
            </ul>
            <div class="user_option">
              <a href="">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>
                  Iniciar Seccion
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
      </header>
      <!-- end header section -->
    <main>
        @yield('content')
    </main>
    <footer>
        <!-- Pie de página y otros elementos del footer -->
    </footer>
</body>
</html>