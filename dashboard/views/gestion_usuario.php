<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Gestión de Usuarios</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
      <link rel="stylesheet" href="../../assets/css/libs.min.css">
      <link rel="stylesheet" href="../../assets/css/nairobi.css?v=1.0.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-PpKLTOhDHFojJlZ3w0OszIB3Ff1fnP88Cte43ZNsR6Y6F4zP5S4eW7JEhy/KgRHtMj9UbVhRFD6Mvffg+38Zxg==" crossorigin="anonymous" />
      <!--necesario -->
      <!-- Enlace a SweetAlert CSS desde la CDN (ejemplo): -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">
      <!-- Enlace a SweetAlert JavaScript desde la CDN (ejemplo): -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>
	  <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

      <!-- CSS para los bordes de los cards -->
<style>
	       .imagen-izquierda {
        margin-left: -70px; 
  .card-border-green {
    border-color: #28a745 !important; /* Verde para Disponible */
  }

  .card-border-red {
    border-color: #dc3545 !important; /* Rojo para No Disponible */
  }

  .card-border-yellow {
    border-color: #ffc107 !important; /* Amarillo para En Uso */
  }
</style>
   </head>
   <body class=" ">
      <!-- loader Start -->
      <div id="loading">
         <div class="loader simple-loader">
            <div class="loader-body"></div>
         </div>
      </div>
      <!-- loader END -->
      <!--Menu lateral-->
      <!--Inserte aqui el codigo para incluir el sidebar-->
      <?php
         // Incluir el archivo sidebar.php
         include '../materials/sidebar.php';
         ?>

      <!--Fin de menu lateral-->
      <main class="main-content">
         <div class="position-relative">
            <!--Nav Start-->
            <!--Inserte aqui el codigo para incluir el navbar-->
            <?php
               // Incluir el archivo sidebar.php
               include '../materials/navbar.php';
               ?>
            <!--Nav End-->
         </div>
         <!-- contenido de la pagina-->
         <div class="container-fluid content-inner pb-0">
            <div class="row">
               <div class="d-flex justify-content-between">
                  <div>
                     <h2 class="text-primary fw-bold mb-3">Gestión Usuarios</h2>
                     <p>Aquí podras gestionar a todos los usarios registrados</p>
                  </div>
                   <!-- Sección de Cards en horizontal -->


         </div>
               </div>
               
               <div class="col-lg-12 mt-3">
                  <div class="card banner d-block">
                     <div class="banner-actions d-none">
                        <button type="button" class="banner-slider-next btn btn-white text-primary rounded-pill btn-icon me-3 ">
                           <span class="btn-inner">
                              <svg width="32" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                              </svg>
                           </span>
                        </button>
                        <button type="button" class="banner-slider-prev btn btn-white text-primary rounded-pill btn-icon">
                           <span class="btn-inner">
                              <svg width="32" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                              </svg>
                           </span>
                        </button>
                     </div>
                     <div class="card-body banner-body">
                        <span class="banner-text">VIAJES</span>
                        <div class="banner-item py-5">
                           <div class="banner-text-1">
                              <h3>Usuarios</h3>
                              <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.87651 15.2063C6.03251 15.2063 2.74951 15.7873 2.74951 18.1153C2.74951 20.4433 6.01251 21.0453 9.87651 21.0453C13.7215 21.0453 17.0035 20.4633 17.0035 18.1363C17.0035 15.8093 13.7415 15.2063 9.87651 15.2063Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.8766 11.886C12.3996 11.886 14.4446 9.841 14.4446 7.318C14.4446 4.795 12.3996 2.75 9.8766 2.75C7.3546 2.75 5.3096 4.795 5.3096 7.318C5.3006 9.832 7.3306 11.877 9.8456 11.886H9.8766Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M19.2036 8.66919V12.6792" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M21.2497 10.6741H17.1597" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                Agregar Usuario
            </button>
        </div>
                              <!--Inserte aqui dentro del card-->
                              <div class="banner-item py-5 d-flex align-items-center">
                              <table id="myTable" class="table table-dark table-striped table-hover">
								<thead>
									<tr>
										<th scope="col">id</th>
										<th scope="col">Usuario</th>
										<th scope="col">Estatus</th>
										<th scope="col">Nombre</th>
										<th scope="col">Apellido materno</th>
										<th scope="col">Rol</th>

										<th scope="col">Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php
            include "../controladores/conexion_bd.php";
            $sql=$conexion->query(" SELECT id_usuario, usuario, clave, estatus_usuario, nombre, apellido_paterno, apellido_materno, rol FROM usuarios;");
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
												<?= $datos->apellido_materno?>
											</td>
											<td>
												<?= $datos-> rol?>
											</td>



											<td>
												<button type="button" class="btn btn-small btn-info" onclick="cargarDatosEnModalLectura(<?= $datos->id_usuario ?>, '<?= $datos->usuario ?>', '<?= $datos->estatus_usuario ?>', '<?= $datos->nombre ?>', '<?= $datos->apellido_paterno ?>', '<?= $datos->apellido_materno ?>', '<?= $datos-> rol ?>');">
    <i class="icon">
    <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.1614 12.0531C15.1614 13.7991 13.7454 15.2141 11.9994 15.2141C10.2534 15.2141 8.83838 13.7991 8.83838 12.0531C8.83838 10.3061 10.2534 8.89111 11.9994 8.89111C13.7454 8.89111 15.1614 10.3061 15.1614 12.0531Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.998 19.355C15.806 19.355 19.289 16.617 21.25 12.053C19.289 7.48898 15.806 4.75098 11.998 4.75098H12.002C8.194 4.75098 4.711 7.48898 2.75 12.053C4.711 16.617 8.194 19.355 12.002 19.355H11.998Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
    </i>
</button>
												<button type="button" class="btn btn-small btn-warning" onclick="cargarDatosEnModal(<?= $datos->id_usuario ?>, '<?= $datos->usuario ?>', '<?= $datos->estatus_usuario ?>', '<?= $datos->nombre ?>', '<?= $datos->apellido_paterno ?>', '<?= $datos->apellido_materno ?>', '<?= $datos-> rol ?>');">
        <i class="icon">
        <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            

        </i>
</button>
												</button>
												<form style="display: inline;">
													<input type='hidden' name='id' value='<?= $datos->id_usuario ?>'>
													<button type="button" name="eliminarRegistro" onclick="confirmarEliminacion(<?= $datos->id_usuario ?>); return false;" class="btn btn-small btn-danger">
                                       <i class="icon">
                                       <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                       </i></button>
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

         <!--Final de contenido de la pagina-->
         <!--Pie de pagina-->
         <!-- Inserte aqui el codigo para inluir el footer-->
         <?php
            // Incluir el archivo sidebar.php
            include '../materials/footer.php';
            ?>
         <!--final de pie de pagina-->
      </main>
      <!-- Wrapper End-->
      <!-- Backend Bundle JavaScript -->
      <script src="../../assets/js/libs.min.js"></script>
      <!-- widgetchart JavaScript -->
      <script src="../../assets/js/charts/widgetcharts.js"></script>
      <!-- dashboard JavaScript -->
      <script src="../../assets/js/charts/dashboard.js"></script>
      <!-- fslightbox JavaScript -->
      <script src="../../assets/js/fslightbox.js"></script>
      <!-- app JavaScript -->
      <script src="../../assets/js/app.js"></script>
      <!-- apexchart JavaScript -->
      <script src="../../assets/js/charts/apexcharts.js"></script>
      <!-- countdown JavaScript -->
      <script src="../../assets/js/countdown.js" ></script> 
      <!-- jQuery -->
      <!-- Bootstrap JS -->
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
      <script src="../js/gestion_usuario.js"></script>
   </body>
</html>