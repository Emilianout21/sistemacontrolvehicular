<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Gestión Vehicular</title>
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
                     <h2 class="text-primary fw-bold mb-3">Gestión Vehicular</h2>
                     <p>Aquí podras gestionar tu parque vehicular</p>
                  </div>
                   <!-- Sección de Cards en horizontal -->
         <div class="d-flex">
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
            <div class="card mb-3 me-2 card-border-green">
   <div class="card-body">
      <!-- Icono SVG para Disponible (Success) -->
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#28a745" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M22 11.07V12a10 10 0 1 1-5.93-9.14"/>
        <polyline points="22 4 12 14.01 9 11.01"/>
      </svg>

      <!-- Contenido de la Card 1 -->
      <h5 class="card-title">Disponible</h5>
      <p class="card-text"><?php echo $disponible_count . " Vehiculos" ?></p>
   </div>
</div>

<div class="card mb-3 me-2 card-border-red">
   <div class="card-body">
      <!-- Icono SVG para No Disponible (Tacha) -->
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="10"/>
        <line x1="8" y1="12" x2="16" y2="12"/>
      </svg>
      <!-- Contenido de la Card 2 -->
      <h5 class="card-title">No Disponible</h5>
      <p class="card-text"><?php echo $no_disponible_count . " Vehiculos" ?></p>
   </div>
</div>

<div class="card mb-3 card-border-yellow">
   <div class="card-body">
      <!-- Icono SVG para En Uso (Warning) -->
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffc107" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="10"/>
        <line x1="12" y1="8" x2="12" y2="16"/>
        <line x1="12" y1="16" x2="12" y2="16"/>
      </svg>

      <!-- Contenido de la Card 3 -->
      <h5 class="card-title">En Uso</h5>
      <p class="card-text"><?php echo $en_uso_count . " Vehiculos" ?></p>
   </div>
</div>

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
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.0001 8.32739V15.6537" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M15.6668 11.9904H8.3335" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.6857 2H7.31429C4.04762 2 2 4.31208 2 7.58516V16.4148C2 19.6879 4.0381 22 7.31429 22H16.6857C19.9619 22 22 19.6879 22 16.4148V7.58516C22 4.31208 19.9619 2 16.6857 2Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                Agregar Vehiculo
            </button>
        </div>
                              <!--Inserte aqui dentro del card-->
                              <div class="banner-item py-5 d-flex align-items-center">
                                 <table id="myTable" class="table table-dark table-striped table-hover mx-auto">
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
                                                <i class="icon">
                                                   <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M15.1614 12.0531C15.1614 13.7991 13.7454 15.2141 11.9994 15.2141C10.2534 15.2141 8.83838 13.7991 8.83838 12.0531C8.83838 10.3061 10.2534 8.89111 11.9994 8.89111C13.7454 8.89111 15.1614 10.3061 15.1614 12.0531Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M11.998 19.355C15.806 19.355 19.289 16.617 21.25 12.053C19.289 7.48898 15.806 4.75098 11.998 4.75098H12.002C8.194 4.75098 4.711 7.48898 2.75 12.053C4.711 16.617 8.194 19.355 12.002 19.355H11.998Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                   </svg>
                                                </i>
                                             </button>
                                             <button type="button" class="btn btn-small btn-warning" onclick="cargarDatosEnModal(<?= $datos->id_vehiculo ?>, '<?= $datos->Marca ?>', '<?= $datos->Modelo ?>', '<?= $datos->Placas ?>', '<?= $datos->Numero_serie ?>', '<?= $datos->Tipo_Vehiculo ?>', '<?= $datos->estatus_vehiculo ?>');">
                                                <i class="icon">
                                                   <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                      <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                      <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                   </svg>
                                                </i>
                                             </button>
                                             </button>
                                             <form style="display: inline;">
                                                <input type='hidden' name='id' value='<?= $datos->id_vehiculo ?>'>
                                                <button type="button" name="eliminarRegistro" onclick="confirmarEliminacion(<?= $datos->id_vehiculo ?>); return false;" class="btn btn-small btn-danger">
                                                   <i class="icon">
                                                      <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                         <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                         <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                         <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                      </svg>
                                                   </i>
                                                </button>
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
      <script src="../js/gestion_vehicular.js"></script>
   </body>
</html>