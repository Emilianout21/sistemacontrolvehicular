<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Solicitudes</title>
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
        margin-left: -70px; /* Puedes ajustar este valor según tus necesidades */
    }
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
                     <h2 class="text-primary fw-bold mb-3">Solicitud Vehicular</h2>
                     <p>Aquí podras gestionar las solictudes vehiculares</p>
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
                              <h3>Vehiculos</h3>
                              <div class="d-flex justify-content-end">
        </div>
                              <!--Inserte aqui dentro del card-->
                              <div class="banner-item py-5 d-flex align-items-center">
                              <table id="myTable" class="table table-dark table-striped table-hover">
								<thead>
									<tr>
										<th scope="col">#</th>
						<!--				<th scope="col">Id Chofer</th> -->
										<th scope="col">Chofer</th>
										<th scope="col">Asunto</th>
										<th scope="col">Fecha / Hora</th>
										<th scope="col">Estauts</th>

										<th scope="col">Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php
            include "../controladores/conexion_bd.php";
            $sql=$conexion->query("SELECT b.nombre, a.id_remitente, a.asunto, a.mensaje, a.fecha, a.estatus FROM solicitudes a INNER JOIN usuarios b ON a.id_remitente = b.id_usuario");
           $contador = 1;
            while($datos=$sql->fetch_object()){ 
        ?>
										<tr>
											<td>
												<?= $contador ?>
											</td>
					<!--						<td>
												<?= $datos->id_remitente ?>
											</td> -->
											<td>
												<?= $datos->nombre ?>
											</td>
											<td>
												<?= $datos->asunto ?>
											</td>
											<td>
												<?= $datos->fecha ?>
											</td>
											<td>
												<?= $datos->estatus ?>
											</td>

											<td>
                      <button type="button" class="btn btn-small btn-info" onclick="cargarDatosEnModalMensaje('<?= $datos->nombre ?>', '<?= $datos->asunto ?>', '<?= $datos->fecha ?>', '<?= $datos->mensaje ?>');"> 
                      <i class="icon"> 
                      <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.4541 11.3918C22.7819 11.7385 22.7819 12.2615 22.4541 12.6082C21.0124 14.1335 16.8768 18 12 18C7.12317 18 2.98759 14.1335 1.54586 12.6082C1.21811 12.2615 1.21811 11.7385 1.54586 11.3918C2.98759 9.86647 7.12317 6 12 6C16.8768 6 21.0124 9.86647 22.4541 11.3918Z" stroke="currentColor"></path>
                        <circle cx="12" cy="12" r="3.5" stroke="currentColor"></circle>
                        <circle cx="13.5" cy="10.5" r="1.5" fill="currentColor"></circle>
                        </svg>                            
                      </i> Detalles</button>

								<button type="button" style="color: #ffffff;" class="btn btn-small btn-dark"  onclick="cargarDatosEnModalAsignar(<?= $datos->id_remitente ?>);">
                        <i class="icon">
                        <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M15.8325 8.17463L10.109 13.9592L3.59944 9.88767C2.66675 9.30414 2.86077 7.88744 3.91572 7.57893L19.3712 3.05277C20.3373 2.76963 21.2326 3.67283 20.9456 4.642L16.3731 20.0868C16.0598 21.1432 14.6512 21.332 14.0732 20.3953L10.106 13.9602" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">             
                           </path>
                        </svg>                            
                        </i> Asignar     
                        </button>
												</button>
												<form style="display: inline;">
													<input type='hidden' name='id' value='<?= $datos->id_vehiculo ?>'>
													<button type="button" name="eliminarRegistro" onclick="confirmarEliminacion(<?= $datos->id_vehiculo ?>); return false;" class="btn btn-small btn-danger">
                                       <i class="icon">
                                       <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.81409 20.4368H19.1971C20.7791 20.4368 21.7721 18.7267 20.9861 17.3527L13.8001 4.78775C13.0091 3.40475 11.0151 3.40375 10.2231 4.78675L3.02509 17.3518C2.23909 18.7258 3.23109 20.4368 4.81409 20.4368Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.0024 13.4147V10.3147" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M11.995 16.5H12.005" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>                              
                                      </svg>                            
                                       </i> Declinar</button>
												</form>
											</td>
										</tr>
										<?php
                     $contador++;
 } ?>
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
		<!-- Modal de Mensaje -->
		<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="viewModalLabel">Mensaje</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form>
							<div class="mb-3">
								<label for="viewRemitente" class="form-label">Remitente:</label>
								<input type="text" class="form-control" id="viewRemitente" readonly>
							</div>
							<div class="mb-3">
								<label for="viewAsunto" class="form-label">Asunto:</label>
								<input type="text" class="form-control" id="viewAsunto" readonly>
							</div>
							<div class="mb-3">
								<label for="viewMensaje" class="form-label">Mensaje:</label>
                <textarea class="form-control" id="viewMensaje" readonly></textarea>
							</div>
							<div class="mb-3">
								<label for="viewFecha" class="form-label">Fecha:</label>
								<input type="datetime-local" class="form-control" id="vieFecha" readonly>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div> 

      <!-- Modal para asignar vehiculo-->
      <div class="modal fade" id="asignarModal" tabindex="-1" aria-labelledby="asignarModalLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="updateModalLabel">Asignar Vehículo</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <!-- Formulario de actualización -->
                     <form id="asignarForm" action="../controladores/asignar_vehiculo.php" method="post">
                        <div class="mb-3">
                           <label for="asignarChofer" class="form-label">Id Chofer:</label>
                           <input type="text" class="form-control" id="asignarChofer" name="asignarChofer" required readonly>
                        </div>
                        <div class="mb-3">
                           <label for="asignarVehiculo" class="form-label">Vehiculo:</label>
                           <select  id="asignarVehiculo" name="asignarVehiculo" required>
                           <?php
                           include "../controladores/conexion_bd.php";
                           // Consulta para obtener los vehículos
                              $consulta = "SELECT id_vehiculo, Marca, Modelo FROM vehiculos";
                              $resultado = $conexion->query($consulta);

                               // Generar las opciones del select
                           while ($fila = $resultado->fetch_assoc()) {
                               echo "<option value='" . $fila['id_vehiculo'] . "'>" . $fila['Marca'] . " " . $fila['Modelo'] . "</option>";
                              }

                             $conexion->close();

                           
                           ?>
                           </select>
                        </div>
                        <input type="hidden" id="idVehiculoSeleccionado" name="idVehiculoSeleccionado">S
                        <div class="mb-3">
                           <label for="asignarFecha" class="form-label">Fecha de inicio:</label>
                           <input type="date" class="form-control" id="asignarFecha" name="asignarFecha" required>
                        </div>
                        <div class="mb-3">
                           <label for="asignarHora" class="form-label">Hora de inicio:</label>
                           <input type="time" class="form-control" id="asignarHora" name="asignarHora" required>
                        </div>
                        <input type="hidden" id="updateId" name="updateId">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar
                                       <i class="icon">
                                       <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M4.81409 20.4368H19.1971C20.7791 20.4368 21.7721 18.7267 20.9861 17.3527L13.8001 4.78775C13.0091 3.40475 11.0151 3.40375 10.2231 4.78675L3.02509 17.3518C2.23909 18.7258 3.23109 20.4368 4.81409 20.4368Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.0024 13.4147V10.3147" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M11.995 16.5H12.005" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>                              
                                      </svg>                            
                                       </i>
                        </button>
                        <button type="submit" class="btn btn-primary">Asignar 
                        <i class="icon">
                        <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M15.8325 8.17463L10.109 13.9592L3.59944 9.88767C2.66675 9.30414 2.86077 7.88744 3.91572 7.57893L19.3712 3.05277C20.3373 2.76963 21.2326 3.67283 20.9456 4.642L16.3731 20.0868C16.0598 21.1432 14.6512 21.332 14.0732 20.3953L10.106 13.9602" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">             
                           </path>
                        </svg>                            
                        </i>
                        </button>
                     </form>
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
      <script src="../js/bandeja_solicitudes.js"></script>
   </body>
</html>