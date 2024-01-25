<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<!-- Bootstrap CSS -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
	<!-- DataTables CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
	<!-- Encabezado y enlaces CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-1HI6aKafvcptOnFwFqsav46sMYogkRAm++NV6uc8Q+Me8Un9VUrv2QOotLmejjF6rPG2wGx66aP50QiI+o3B9g==" crossorigin="anonymous" />

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <link href="../css/scv.css" rel="stylesheet">
</head>
<title>Gestion vehicular</title>
<style>
	@import url('https://fonts.googleapis.com/css?family=Open+Sans:400,700,800');
@import url('https://fonts.googleapis.com/css?family=Lobster');

body {
  font-family: 'Open Sans', sans-serif;
  font-size: 1.0rem;
  font-weight: 300;
}
h1 {
  margin-bottom: 0.5em;
  font-size: 2rem;
}
        .disponible::before {
                    font-family: 'Font Awesome 5 Free';
                    content: "\f5e2"; /* Código del icono de coche disponible */
                    font-size: 100px;
                    color: green;
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                }
        
                .no-disponible::before {
                    font-family: 'Font Awesome 5 Free';
                    content: "\f5df"; /* Código del icono de batería de coche */
                    font-size: 100px;
                    color: #740000;
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                }
        
                .en-uso::before {
                    font-family: 'Font Awesome 5 Free';
                    content: "\f5d1"; /* Código del icono de coche accidentado */
                    font-size: 100px;
                    color: orange;
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                }
                #custom-search-input {
                    position: absolute;
                    top: 10px;
                    right: 10px;
                    display: flex;
                    align-items: center;
                }
                #searchInput {
                    margin-right: 10px;
                }
                #myTable_filter {
                    display: none;
                }
                .card {
                    width: 95%;
					height: 95;
                    margin: 10px;
                    overflow-x: auto;
                }
        
                h1 {
                    font-size: 2.5rem;
                }
                .container {
                    margin: 1px;
                }
        
                .disponible {
                    background-color: #00AA00;
                }
        
                .no-disponible {
                    background-color: #740000;
                }
        
                .en-uso {
                    background-color: #FFF000;
                }
        
p {
  margin-bottom: 0.5em;
  font-size: 1.6rem;
  line-height: 1.6;
}
.button {
  display: inline-block;
  margin-top: 20px;
  padding: 8px 25px;
  border-radius: 4px;
}
.button-primary {
  position: relative;
  background-color: #c0ca33;
  color: #fff;
  font-size: 1.8rem;
  font-weight: 700;
  transition: color 0.3s ease-in;
  z-index: 1;
}
.button-primary:hover {
  color: #c0ca33;
  text-decoration: none;
}
.button-primary::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  top: 0;
  background-color: #fff;
  border-radius: 4px;
  opacity: 0;
  -webkit-transform: scaleX(0.8);
  -ms-transform: scaleX(0.8);
  transform: scaleX(0.8);
  transition: all 0.3s ease-in;
  z-index: -1;
}
.button-primary:hover::after {
  opacity: 1;
  -webkit-transform: scaleX(1);
  -ms-transform: scaleX(1);
  transform: scaleX(1);
}
.overlay::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  top: 0;
  background-color: rgba(0, 0, 0, .3);
}
.header-area {
    position: relative;
    height: 15vh;
    width: 100%; /* Ajusta el ancho al 100% */
    background: color(srgb red green blue);
    background-attachment: fixed;
    background-position: center center;
    background-repeat: no-repeat; /* Corregido: cambia "no-repear" a "no-repeat" */
    background-size: cover;
}

.banner {
  display: flex;
  align-items: center;
  position: relative;
  height: 100%;
  width: 100%;
  color: #fff;
  text-align: center;
  z-index: 1;
}
.banner h1 {
  font-weight: 800;
}
.banner p {
  font-weight: 700;
}
.navbar {
    position: relative;
    left: 0;
    top: auto; /* Cambia top a auto para que no esté fijo en la parte superior */
    padding: 0;
    width: 100%;
    transition: background 0.6s ease-in;
    z-index: 99999;
}
.offcanvas-start {
        width: 100px; /* Puedes ajustar el valor según sea necesario */
    }
.content {
    margin-top: 70px; /* Ajusta el valor según la altura de tu navbar */
    /* Agrega otros estilos para el contenido si es necesario */
}
.navbar .navbar-brand {
  font-family: 'Lobster', cursive;
  font-size: 1.5rem;
}
.navbar .navbar-toggler {
  position: relative;
  height: 50px;
  width: 50px;
  border: none;
  cursor: pointer;
  outline: none;
}
.navbar .navbar-toggler .menu-icon-bar {
  position: absolute;
  left: 15px;
  right: 15px;
  height: 2px;
  background-color: #fff;
  opacity: 0;
  -webkit-transform: translateY(-1px);
  -ms-transform: translateY(-1px);
  transform: translateY(-1px);
  transition: all 0.3s ease-in;
}
.navbar .navbar-toggler .menu-icon-bar:first-child {
  opacity: 1;
  -webkit-transform: translateY(-1px) rotate(45deg);
  -ms-sform: translateY(-1px) rotate(45deg);
  transform: translateY(-1px) rotate(45deg);
}
.navbar .navbar-toggler .menu-icon-bar:last-child {
  opacity: 1;
  -webkit-transform: translateY(-1px) rotate(135deg);
  -ms-sform: translateY(-1px) rotate(135deg);
  transform: translateY(-1px) rotate(135deg);
}
.navbar .navbar-toggler.collapsed .menu-icon-bar {
  opacity: 1;
}
.navbar .navbar-toggler.collapsed .menu-icon-bar:first-child {
  -webkit-transform: translateY(-7px) rotate(0);
  -ms-sform: translateY(-7px) rotate(0);
  transform: translateY(-7px) rotate(0);
}
.navbar .navbar-toggler.collapsed .menu-icon-bar:last-child {
  -webkit-transform: translateY(5px) rotate(0);
  -ms-sform: translateY(5px) rotate(0);
  transform: translateY(5px) rotate(0);
}
.navbar-dark .navbar-nav .nav-link {
  position: relative;
  color: #fff;
  font-size: 1.0rem;
}
.navbar-dark .navbar-nav .nav-link:focus, .navbar-dark .navbar-nav .nav-link:hover {
  color: #fff;
}
.navbar .dropdown-menu {
  padding: 0;
  background-color: rgba(0, 0, 0, .9);
}
.navbar .dropdown-menu .dropdown-item {
  position: relative;
  padding: 10px 20px;
  color: #fff;
  font-size: 1.0rem;
  border-bottom: 1px solid rgba(255, 255, 255, .1);
  transition: color 0.2s ease-in;
}
.navbar .dropdown-menu .dropdown-item:last-child {
  border-bottom: none;
}
.navbar .dropdown-menu .dropdown-item:hover {
  background: transparent;
  color: #c0ca33;
}
.navbar .dropdown-menu .dropdown-item::before {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  top: 0;
  width: 5px;
  background-color: #c0ca33;
  opacity: 0;
  transition: opacity 0.2s ease-in;
}
.navbar .dropdown-menu .dropdown-item:hover::before {
  opacity: 1;
}
.navbar.fixed-top {
  position: fixed;
  -webkit-animation: navbar-animation 0.6s;
  animation: navbar-animation 0.6s;
  background-color: rgba(0, 0, 0, .9);
}
.navbar.fixed-top.navbar-dark .navbar-nav .nav-link.active {
  color: #c0ca33;
}
.navbar.fixed-top.navbar-dark .navbar-nav .nav-link::after {
  background-color: #c0ca33;
}
.content {
  padding: 120px 0;
}
@media screen and (max-width: 768px) {
  .navbar-brand {
    margin-left: 20px;
  }
  .navbar-nav {
    padding: 0 20px;
    background-color: rgba(0, 0, 0, .9);
  }
  .navbar.fixed-top .navbar-nav {
    background: transparent;
  }
}
@media screen and (min-width: 767px) {
  .banner {
    padding: 0 150px;
  }
  .banner h1 {
    font-size: 5rem;
  }
  .banner p {
    font-size: 2rem;
  }
  .navbar-dark .navbar-nav .nav-link {
    padding: 23px 15px;
  }
  .navbar-dark .navbar-nav .nav-link::after {
    content: '';
    position: absolute;
    bottom: 15px;
    left: 30%;
    right: 30%;
    height: 1px;
    background-color: #fff;
    -webkit-transform: scaleX(0);
    -ms-transform: scaleX(0);
    transform: scaleX(0);
    transition: transform 0.1s ease-in;
  }
  .navbar-dark .navbar-nav .nav-link:hover::after {
    -webkit-transform: scaleX(1);
    -ms-transform: scaleX(1);
    transform: scaleX(1);
  }
  .dropdown-menu {
    min-width: 200px;
    -webkit-animation: dropdown-animation 0.3s;
    animation: dropdown-animation 0.3s;
    -webkit-transform-origin: top;
    -ms-transform-origin: top;
    transform-origin: top;
  }
}
@-webkit-keyframes navbar-animation {
  0% {
    opacity: 0;
    -webkit-transform: translateY(-100%);
    -ms-transform: translateY(-100%);
    transform: translateY(-100%);
  }
  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
    -ms-transform: translateY(0);
    transform: translateY(0);
  }
}
@keyframes navbar-animation {
  0% {
    opacity: 0;
    -webkit-transform: translateY(-100%);
    -ms-transform: translateY(-100%);
    transform: translateY(-100%);
  }
  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
    -ms-transform: translateY(0);
    transform: translateY(0);
  }
}
@-webkit-keyframes dropdown-animation {
  0% {
    -webkit-transform: scaleY(0);
    -ms-transform: scaleY(0);
    transform: scaleY(0);
  }
  75% {
    -webkit-transform: scaleY(1.1);
    -ms-transform: scaleY(1.1);
    transform: scaleY(1.1);
  }
  100% {
    -webkit-transform: scaleY(1);
    -ms-transform: scaleY(1);
    transform: scaleY(1);
  }
}
@keyframes dropdown-animation {
  0% {
    -webkit-transform: scaleY(0);
    -ms-transform: scaleY(0);
    transform: scaleY(0);
  }
  75% {
    -webkit-transform: scaleY(1.1);
    -ms-transform: scaleY(1.1);
    transform: scaleY(1.1);
  }
  100% {
    -webkit-transform: scaleY(1);
    -ms-transform: scaleY(1);
    transform: scaleY(1);
  }
}
</style>
</head>
<body>

<?php
// Incluir el archivo sidebar.php
include '../materials/sidebar.php';
?>
</div>
<div class="content-wrapper">


	<?php
              include "../controladores/conexion_bd.php";
				// Aqui se instancio 3 variables cuyo valor es la sentencia sql
				
              $disponible_query = "SELECT COUNT(*) as count_disponible FROM vehiculos WHERE estatus_vehiculo='1'";
              $no_disponible_query = "SELECT COUNT(*) as count_no_disponible FROM vehiculos WHERE estatus_vehiculo='3'";
              $en_uso_query = "SELECT COUNT(*) as count_en_uso FROM vehiculos WHERE estatus_vehiculo='2'";

			  // Se inciializo 3 variables mas cuyo valor es el resultado de las 3 variables anteriores
			  // Para que los query se apliquen en la bd se usa la variable $conexion que es donde hace la
			  //conexion a la bd, y a este se le inserta el query por medio de la funcion query().

              $disponible_result = $conexion->query($disponible_query);
              $no_disponible_result = $conexion->query($no_disponible_query);
              $en_uso_result = $conexion->query($en_uso_query);
  
			  //El método fetch_assoc() intenta recuperar la siguiente fila de un conjunto de resultados como un array asociativo.
			  //['count_disponible'] accede a un valor específico dentro del array asociativo recuperado, asumiendo que la columna count_disponible existe en el resultado de la consulta.

              $disponible_count = $disponible_result->fetch_assoc()['count_disponible'];
              $no_disponible_count = $no_disponible_result->fetch_assoc()['count_no_disponible'];
              $en_uso_count = $en_uso_result->fetch_assoc()['count_en_uso'];

          ?>
		<div class="container-fluid pt-3" style="margin-left: 20px;">
		
			<div class="card bg-dark">
				<!-- La clase card-header es una clase de Bootstrap que se utiliza para aplicar 
			estilos específicos a la cabecera de una tarjeta. -->
				<!-- La clase text-center es una clase de utilidad de Bootstrap que se utiliza para alinear el texto en el centro.-->
				<div class="card-header text-center">
					<!-- La clase flex-column es una clase de utilidad de Bootstrap que se utiliza para establecer la dirección de
			 los elementos en el contenedor, en este caso, en una columna vertical -->
					<div class="d-flex flex-column">
						<!--La clase d-flex es una clase de utilidad de Bootstrap que establece el contenedor como un "contenedor flexible". 
				Esto significa que los elementos dentro de este contenedor pueden ser ajustados y organizados fácilmente.
				La clase flex-column es una clase de utilidad de Bootstrap que se aplica a un contenedor flexible y define la dirección 
				en la que los elementos deben ser organizados, en este caso, en una columna vertical. -->
						<div class="d-flex flex-row">
							<!-- Aqui se agrego 3 cards haciendo referencia a los 3 estus de un vheiculo, con php se hace
					la llamada de las variables de php con el cual hicimos el conteo de los vehiculos de cada de los 3
				estatus -->
							<div class="col">
								<div class="card text-center disponible" style="margin-right: 10px; position: relative;">
									<div class="card-body">
										<i class="fas fa-car fa-3x mb-3"></i>
										<h5 class="card-title" style="color: white;">Disponible</h5>
										<p style="color: white;">
											<?php echo $disponible_count . " Vehiculos" ?>
										</p>

									</div>
								</div>
							</div>
							<div class="col">
								<div class="card text-center no-disponible" style="margin-right: 10px; position: relative;">
									<div class="card-body">
										<i class="fas fa-car-battery fa-3x mb-3"></i>
										<h5 class="card-title">No disponible</h5>
										<p>
											<?php echo $no_disponible_count . " Vehiculos" ?>
										</p>

									</div>
								</div>
							</div>
							<div class="col">
								<div class="card text-center en-uso" style="position: relative;">
									<div class="card-body">
										<i class="fas fa-car-crash fa-3x mb-3"></i>
										<h5 class="card-title">En uso</h5>
										<p>
											<?php echo $en_uso_count . " Vehiculos" ?>
										</p>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		</div>
		<div class="offcanvas offcanvas-start d-flex flex-column flex-shrink-0 p-3 bg-success" data-bs-scroll="true" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel" style="width: 280px; border-right:2px solid #EBAF0E;">
    <div class="offcanvas-header align-items-end">
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        
    </div>
    <div class="offcanvas-body">
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item items">
                <a href="AppProgres.php" class="nav-link">
                    <svg class="bi text-light" width="20" height="20" fill="currentColor">
                        <use xlink:href="library/icons/bootstrap-icons.svg#speedometer" />
                    </svg>&nbsp;&nbsp;&nbsp;<span class="text-light">DeshBoard</span>
                </a>
            </li>
            <li class="nav-item items">
                <a href="UsuariosSistem.php" class="nav-link">
                    <svg class="bi text-light" width="20" height="20" fill="currentColor">
                        <use xlink:href="library/icons/bootstrap-icons.svg#people-fill" />
                    </svg>&nbsp;&nbsp;&nbsp;<span class="text-light">Usuarios</span>
                </a>
            </li>
            <li class="nav-item items">
                <a href="#" class="nav-link">
                    <svg class="bi text-light" width="20" height="20" fill="currentColor">
                        <use xlink:href="library/icons/bootstrap-icons.svg#clipboard-check-fill" />
                    </svg>&nbsp;&nbsp;&nbsp;<span class="text-light">Materiales</span>
                </a>
            </li>
            <li class="nav-item items">
                <a href="#" class="nav-link">
                    <svg class="bi text-light" width="20" height="20" fill="currentColor">
                        <use xlink:href="library/icons/bootstrap-icons.svg#card-checklist" />
                    </svg>&nbsp;&nbsp;&nbsp;<span class="text-light">Solicitudes</span>
                </a>
            </li>
            <li class="nav-item items">
                <a href="#" class="nav-link">
                    <svg class="bi text-light" width="20" height="20" fill="currentColor">
                        <use xlink:href="library/icons/bootstrap-icons.svg#building-exclamation" />
                    </svg>&nbsp;&nbsp;&nbsp;<span class="text-light">Laboratorios</span>
                </a>
            </li>
            <li class="nav-item items">
                <a href="#" class="nav-link">
                    <svg class="bi text-light" width="20" height="20" fill="currentColor">
                        <use xlink:href="library/icons/bootstrap-icons.svg#tags-fill" />
                    </svg>&nbsp;&nbsp;&nbsp;<span class="text-light">Kardex</span>
                </a>
            </li>
            <li class="nav-item items">
                <a href="#" class="nav-link">
                    <svg class="bi text-light" width="20" height="20" fill="currentColor">
                        <use xlink:href="library/icons/bootstrap-icons.svg#ui-checks" />
                    </svg>&nbsp;&nbsp;&nbsp;<span class="text-light">Practicas</span>
                </a>
            </li>
            <li class="nav-item items">
                <a href="#" class="nav-link">
                    <svg class="bi text-light" width="20" height="20" fill="currentColor">
                        <use xlink:href="library/icons/bootstrap-icons.svg#bell-fill" />
                    </svg>&nbsp;&nbsp;&nbsp;<span class="text-light">Notificaciones</span>
                </a>
            </li>
            <li class="nav-item items">
                <a href="#" class="nav-link">
                    <svg class="bi text-light" width="20" height="20" fill="currentColor">
                        <use xlink:href="library/icons/bootstrap-icons.svg#gear-fill" />
                    </svg>&nbsp;&nbsp;&nbsp;<span class="text-light">Configuracion</span>
                </a>
            </li>
            <li class="nav-item items">
                <a href="#" data-bs-toggle="modal" data-bs-target="#CSesionModal" class="nav-link">
                    <svg class="bi text-light" width="20" height="20" fill="currentColor">
                        <use xlink:href="library/icons/bootstrap-icons.svg#power" />
                    </svg>&nbsp;&nbsp;&nbsp;<span class="text-light">Cerrar Sesión</span>
                </a>
            </li>
        </ul>
    </div>
</div>

		<div class="container-fluid pt-5" style="margin-left: 20px;">
			<div class="card bg-dark">
				<div class="card-header text-center">
					<h1>Gestion Vehicular</h1>
					<div class="card text-center">
						<div class="card-body bg-light">
							<div id="custom-search-input">
								<input type="text" id="searchInput" placeholder="Buscar en la tabla" style="width: 250px;">
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            +
        </button>
							</div>

							<table id="myTable" class="table table-dark table-striped table-hover">
								<thead>
									<tr>
										<th scope="col">ID</th>
										<th scope="col">Marca</th>
										<th scope="col">Modelo</th>
										<th scope="col">Placas</th>
										<th scope="col">Num. Serie</th>
										<th scope="col">Tipo</th>
										<th scope="col" >Estatus</th>

										<th scope="col">Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php
            include "../controladores/conexion_bd.php";
            $sql=$conexion->query(" SELECT id_vehiculo, Marca, Modelo, Placas, Numero_serie, Tipo_Vehiculo, estatus_vehiculo FROM vehiculos");
            while($datos=$sql->fetch_object()){ 
        ?>
										<tr>
											<td>
												<?= $datos->id_vehiculo ?>
											</td>
											<td>
												<?= $datos->Marca ?>
											</td>
											<td>
												<?= $datos->Modelo ?>
											</td>
											<td>
												<?= $datos->Placas ?>
											</td>
											<td>
												<?= $datos->Numero_serie ?>
											</td>
											<td>
												<?= $datos->Tipo_Vehiculo ?>
											</td>
											<td id="estatus<?= $datos->id_vehiculo ?>">
                                           <?= $datos->estatus_vehiculo ?>
                                            </td>

											<td>
												<button type="button" class="btn btn-small btn-info" onclick="cargarDatosEnModalLectura(<?= $datos->id_vehiculo ?>, '<?= $datos->Marca ?>', '<?= $datos->Modelo ?>', '<?= $datos->Placas ?>', '<?= $datos->Numero_serie ?>', '<?= $datos->Tipo_Vehiculo ?>', '<?= $datos->estatus_vehiculo ?>');">
    <i class="fas fa-eye" style="color: #ffffff;"></i>
</button>
												<button type="button" class="btn btn-small btn-warning" onclick="cargarDatosEnModal(<?= $datos->id_vehiculo ?>, '<?= $datos->Marca ?>', '<?= $datos->Modelo ?>', '<?= $datos->Placas ?>', '<?= $datos->Numero_serie ?>', '<?= $datos->Tipo_Vehiculo ?>', '<?= $datos->estatus_vehiculo ?>');">
                        <i class="fas fa-pencil" style="color: #ffffff;"></i>

</button>
												</button>
												<form style="display: inline;">
													<input type='hidden' name='id' value='<?= $datos->id_vehiculo ?>'>
													<button type="button" name="eliminarRegistro" onclick="confirmarEliminacion(<?= $datos->id_vehiculo ?>); return false;" class="btn btn-small btn-danger"><i class="fas fa-trash-alt" style="color: #ffffff;"></i></button>
												</form>
											</td>
										</tr>
										<script>
										document.addEventListener("DOMContentLoaded", function () {
    var estatusColumn<?= $datos->id_vehiculo ?> = document.getElementById("estatus<?= $datos->id_vehiculo ?>");

    var estatus = estatusColumn<?= $datos->id_vehiculo ?>.innerHTML;

    var imagenSrc;

    switch (estatus) {
        case "1":
            imagenSrc = "../materials/GOD.png";
            break;
        case "2":
            imagenSrc = "ruta_imagen_en_uso.png";
            break;
        case "3":
            imagenSrc = "ruta_imagen_no_disponible.png";
            break;
        default:
            break;
    }

    // Configurar la ruta de la imagen como contenido de la celda
    estatusColumn<?= $datos->id_vehiculo ?>.innerHTML = `<img src="${imagenSrc}" alt="${estatus}" />`;

    // Puedes aplicar estilos adicionales si es necesario
    estatusColumn<?= $datos->id_vehiculo ?>.style.padding = "5px";
    estatusColumn<?= $datos->id_vehiculo ?>.style.borderRadius = "5px";
});
</script>
										<?php } ?>
								</tbody>
							</table>

						</div>
					</div>
				</div>
			</div>
		</div>


		<!-- Modal Registrar -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h2>Registro de vehiculo</h2>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">

						<form id="registroForm" action="../controladores/registro_vehiculo.php" method="post">
							Marca: <input type="text" name="marca"><br><br> Modelo: <input type="text" name="modelo"><br><br> Año: <input type="text" name="anio"><br><br> Placas: <input type="text" name="placas"><br><br> Kilometraje: <input type="text" name="kilometraje"><br><br> Tipo de Vehículo: <input type="text" name="tipo"><br><br> Número de Serie: <input type="text" name="numero_serie"><br><br> Estatus del Vehículo: <input type="text" name="estatus"><br><br>
							<div class="">
								<button type="submit" name="insertar" class="btn btn-primary">Enviar</button>

							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal para modificar registro -->
		<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="updateModalLabel">Actualizar Vehículo</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<!-- Formulario de actualización -->
						<form id="updateForm" action="../controladores/edita_vehiculo.php" method="post">
							<div class="mb-3">
								<label for="updateMarca" class="form-label">Marca:</label>
								<input type="text" class="form-control" id="updateMarca" name="updateMarca" required>
							</div>
							<div class="mb-3">
								<label for="updateModelo" class="form-label">Modelo:</label>
								<input type="text" class="form-control" id="updateModelo" name="updateModelo" required>
							</div>
							<div class="mb-3">
								<label for="updatePlacas" class="form-label">Placas:</label>
								<input type="text" class="form-control" id="updatePlacas" name="updatePlacas" required>
							</div>
							<div class="mb-3">
								<label for="updateNumSerie" class="form-label">Número de Serie:</label>
								<input type="text" class="form-control" id="updateNumSerie" name="updateNumSerie" required>
							</div>
							<div class="mb-3">
								<label for="updateTipo" class="form-label">Tipo:</label>
								<input type="text" class="form-control" id="updateTipo" name="updateTipo" required>
							</div>
							<div class="mb-3">
								<label for="updateEstatus" class="form-label">Estatus:</label>
								<input type="text" class="form-control" id="updateEstatus" name="updateEstatus" required>
							</div>
							<input type="hidden" id="updateId" name="updateId">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-primary">Actualizar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal de Lectura -->
		<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="viewModalLabel">Detalles del Vehículo</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form>
							<div class="mb-3">
								<label for="viewMarca" class="form-label">Marca:</label>
								<input type="text" class="form-control" id="viewMarca" readonly>
							</div>
							<div class="mb-3">
								<label for="viewModelo" class="form-label">Modelo:</label>
								<input type="text" class="form-control" id="viewModelo" readonly>
							</div>
							<div class="mb-3">
								<label for="viewPlacas" class="form-label">Placas:</label>
								<input type="text" class="form-control" id="viewPlacas" readonly>
							</div>
							<div class="mb-3">
								<label for="viewNumSerie" class="form-label">Número de Serie:</label>
								<input type="text" class="form-control" id="viewNumSerie" readonly>
							</div>
							<div class="mb-3">
								<label for="viewTipo" class="form-label">Tipo:</label>
								<input type="text" class="form-control" id="viewTipo" readonly>
							</div>
							<div class="mb-3">
								<label for="viewEstatus" class="form-label">Estatus:</label>
								<input type="text" class="form-control" id="viewEstatus" readonly>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>



		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<!-- DataTables JS -->
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
		<script>
			$(document).ready(function () {
						        var table = $('#myTable').DataTable();
						
						        $('#searchInput').on('keyup', function () {
						            table.search(this.value).draw();
						        });
						    });
						
			
		</script>
<script>
jQuery(function($) {
    $(window).on('scroll', function() {
		if ($(this).scrollTop() >= 200) {
			$('.navbar').addClass('fixed-top');
		} else if ($(this).scrollTop() == 0) {
			$('.navbar').removeClass('fixed-top');
		}
	});
	
	function adjustNav() {
		var winWidth = $(window).width(),
			dropdown = $('.dropdown'),
			dropdownMenu = $('.dropdown-menu');
		
		if (winWidth >= 768) {
			dropdown.on('mouseenter', function() {
				$(this).addClass('show')
					.children(dropdownMenu).addClass('show');
			});
			
			dropdown.on('mouseleave', function() {
				$(this).removeClass('show')
					.children(dropdownMenu).removeClass('show');
			});
		} else {
			dropdown.off('mouseenter mouseleave');
		}
	}
	
	$(window).on('resize', adjustNav);
	
	adjustNav();
}); 
</script>
		<!-- Agrega este enlace a SweetAlerts en la sección de encabezado de tu archivo HTML -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="../js/gestion_vehicular.js"></script>


</body>
</html>