<nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
  <!-- Grupo de iconos -->
    <div class="d-flex align-items-center">
    <a class="navbar-brand" href="#">
      <img src="../materials/SCVG.png" alt="Logo de la empresa" height="30">
    </a>  
      <!-- Otras opciones con iconos -->
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
      <span>
      <i class="fas fa-sliders-h"></i>
      </span>
    </button>
      <a class="nav-link text-white me-2" href="#">
        <i class="fas fa-home"></i>
      </a>
      <a class="nav-link text-white me-2" href="#">
        <i class="fas fa-cogs"></i>
      </a>
      <a class="nav-link text-white me-2" href="#">
        <i class="fas fa-chart-bar"></i>
      </a>
      <a class="nav-link text-white me-2" href="#">
        <i class="fas fa-cog"></i>
      </a>
    </div>
    <!-- Navbar Brand with User Photo, Notifications, and Dropdown Menu -->
    <div class="navbar-brand">
      <!-- Icono de Notificaciones -->
      <div class="position-relative d-inline-block">
        <a class="text-white text-decoration-none" href="#" role="button" id="notificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-bell"></i>
          <!-- Número de notificaciones (puedes cambiar este valor según las notificaciones reales) -->
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="notificationsDropdown">
          <!-- Contenido de las notificaciones -->
          <li><a class="dropdown-item" href="#">Notificación 1</a></li>
          <li><a class="dropdown-item" href="#">Notificación 2</a></li>
          <li><a class="dropdown-item" href="#">Notificación 3</a></li>
        </ul>
      </div>

      <!-- Foto de Usuario y Dropdown Menu -->
      <div class="dropdown d-inline-block ms-2">
        <img src="../materials/GOD.png" alt="User Photo" height="30" class="d-inline-block align-text-top rounded-circle">
        <a class="text-white text-decoration-none dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
          Miguel
        </a>
        <ul class="dropdown-menu" aria-labelledby="userDropdown">
          <div>
        <img src="../materials/GOD.png" alt="User Photo" height="90" class="d-inline-block align-text-top rounded-circle">
          </div>  
        <li><a class="dropdown-item" href="#">Mi perfil</a></li>
          <li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
        </ul>
      </div>
    </div>

    <!-- Contenido del Navbar -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Resto de tu contenido actual -->
      <!-- ... -->

      <!-- Icono de Notificaciones -->
      <div class="nav-item ms-auto">
        <a class="nav-link" href="#">
          <i class="fas fa-bell"></i>
        </a>
      </div>
    </div>
  </div>

  <!-- Contenido del Offcanvas -->
  <div class="offcanvas offcanvas-start text-white bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Dark offcanvas</h5>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">
          <!-- Agrega un ícono de Font Awesome al enlace del Offcanvas -->
          <i class="fas fa-home"></i> Inicio
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../vistas/gestion_vehicular.php">
          <!-- Agrega un ícono de Font Awesome al enlace del Offcanvas -->
          <i class="fas fa-car"></i> Parque Vehicular
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../vistas/bandeja_solicitudes.php">
          <!-- Agrega un ícono de Font Awesome al enlace del Offcanvas -->
          <i class="fas fa-file-alt"></i> Solicitudes
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../vistas/proto2.php">
          <!-- Agrega un ícono de Font Awesome al enlace del Offcanvas -->
          <i class="fas fa-map-marker"></i> Enrutamiento
        </a>
      </li>
    </ul>
      <hr>
      <form class="form-inline" role="search">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </form>
    </div>
  </div>
</nav>





