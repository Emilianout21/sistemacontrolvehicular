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

	<link href="../css/sidebar.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <link href="../css/scv.css" rel="stylesheet">
</head>
<title>Gestion Usuarios</title>
</head>
<body>
<div class="container-fluid">

<?php
// Incluir el archivo sidebar.php
include '../materials/sidebar.php';
?>
</div>
<div class="content-wrappe">



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
					<h1>Gestion Usuario</h1>
					<div class="card text-center">
						<div class="card-body bg-light">
							<div id="custom-search-input">
								<input type="text" id="searchInput" placeholder="Buscar en la tabla" style="width: 250px;">
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
								<i class="fas fa-user-alt"> +</i>
        </button>
							</div>

							<table id="myTable" class="table table-dark table-striped table-hover">
								<thead>
									<tr>
										<th scope="col">id</th>
										<th scope="col">Usuario</th>
										<th scope="col">Estatus</th>
										<th scope="col">Nombre</th>
										<th scope="col">Apellido paterno</th>
										<th scope="col">Apellido materno</th>
										<th scope="col">Rol</th>

										<th scope="col">Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php
            include "../controladores/conexion_bd.php";
            $sql=$conexion->query(" SELECT id_usuario, usuario, Contraseña, estatus_usuario, nombre, apellido_paterno, apellido_materno, rol FROM usuarios;");
            while($datos=$sql->fetch_object()){ 
        ?>
										<tr>
											<td>
												<?= $datos->id_usuario ?>
											</td>
											<td>
												<?= $datos->usuario ?>
											</td>
											<td>
												<?= $datos->estatus_usuario ?>
											</td>
											<td>
												<?= $datos->nombre ?>
											</td>
											<td>
												<?= $datos->apellido_paterno ?>
											</td>
											<td>
												<?= $datos->apellido_materno?>
											</td>
											<td>
												<?= $datos-> rol?>
											</td>



											<td>
												<button type="button" class="btn btn-small btn-info" onclick="cargarDatosEnModalLectura(<?= $datos->id_usuario ?>, '<?= $datos->usuario ?>', '<?= $datos->estatus_usuario ?>', '<?= $datos->nombre ?>', '<?= $datos->apellido_paterno ?>', '<?= $datos->apellido_materno ?>', '<?= $datos-> rol ?>');">
    <i class="fas fa-eye" style="color: #ffffff;"></i>
</button>
												<button type="button" class="btn btn-small btn-warning" onclick="cargarDatosEnModal(<?= $datos->id_usuario ?>, '<?= $datos->usuario ?>', '<?= $datos->estatus_usuario ?>', '<?= $datos->nombre ?>', '<?= $datos->apellido_paterno ?>', '<?= $datos->apellido_materno ?>', '<?= $datos-> rol ?>');">
        <i class="fas fa-edit" style="color: #ffffff;"></i>
</button>
												</button>
												<form style="display: inline;">
													<input type='hidden' name='id' value='<?= $datos->id_usuario ?>'>
													<button type="button" name="eliminarRegistro" onclick="confirmarEliminacion(<?= $datos->id_usuario ?>); return false;" class="btn btn-small btn-danger"><i class="fas fa-trash-alt" style="color: #ffffff;"></i></button>
												</form>
											</td>
										</tr>
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
						<h2>Registro de Usuario</h2>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">

						<form id="registroForm" action="../controladores/registro_usuario.php" method="post">
							Usuario: <input type="text" name="usuario"><br> <br> estatus: <input type="text" name="estatus_usuario"><br><br> Nombre: <input type="text" name="nombre"><br><br> Apellido Paterno: <input type="text" name="apellido_paterno"><br><br>  Apellido Materno: <input type="text" name="apellido_paterno"><br><br> Rol: <input type="text" name="rol"><br><br>
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
						<h5 class="modal-title" id="updateModalLabel">Actualizar usuario</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<!-- Formulario de actualización -->
						<form id="updateForm" action="../controladores/edita_usuario.php" method="post">
							<div class="mb-3">
								<label for="updateusuario" class="form-label">Usuario:</label>
								<input type="text" class="form-control" id="updateusuario" name="updateusuario" required>
							</div>
							<div class="mb-3">
								<label for="updateestatus" class="form-label">Estatus:</label>
								<input type="text" class="form-control" id="updateestatus" name="updateestatus" required>
							</div>
							<div class="mb-3">
								<label for="updatenombre" class="form-label">Nombre:</label>
								<input type="text" class="form-control" id="updatenombre" name="updatenombre" required>
							</div>
							<div class="mb-3">
								<label for="updateapellidoP" class="form-label">Apellido Paterno:</label>
								<input type="text" class="form-control" id="updateapellidoP" name="updateapellidoP" required>
							</div>
							<div class="mb-3">
								<label for="updateapellidoM" class="form-label">Apellido Materno:</label>
								<input type="text" class="form-control" id="updateapellidoM" name="updateapellidoM" required>
							</div>
                            <div class="mb-3">
								<label for="updaterol" class="form-label">Rol: </label>
								<input type="text" class="form-control" id="updaterol" name="updaterol" required>
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
						<h5 class="modal-title" id="viewModalLabel">Detalles del usuario</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form>
							<div class="mb-3">
								<label for="viewId" class="form-label">ID usuario:</label>
								<input type="text" class="form-control" id="viewId" readonly>
							</div>
							<div class="mb-3">
								<label for="viewusuario" class="form-label">Usuario:</label>
								<input type="text" class="form-control" id="viewusuario" readonly>
							</div>
							<div class="mb-3">
								<label for="viewestatus" class="form-label">Estatus:</label>
								<input type="text" class="form-control" id="viewestatus" readonly>
							</div>
							<div class="mb-3">
								<label for="viewnombre" class="form-label">Nombre:</label>
								<input type="text" class="form-control" id="viewnombre" readonly>
							</div>
							<div class="mb-3">
								<label for="viewapellidoP" class="form-label">Apellido Paterno:</label>
								<input type="text" class="form-control" id="viewapellidoP" readonly>
							</div>
							<div class="mb-3">
								<label for="viewapellidoM" class="form-label">Apellido Materno:</label>
								<input type="text" class="form-control" id="viewapellidoM" readonly>
							</div>
							<div class="mb-3">
								<label for="viewrol" class="form-label">Rol:</label>
								<input type="text" class="form-control" id="viewrol" readonly>
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

		<!-- Agrega este enlace a SweetAlerts en la sección de encabezado de tu archivo HTML -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="../js/gestion_usuario.js"></script>



</body>
</html>