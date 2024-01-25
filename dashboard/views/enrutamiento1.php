<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Nairobi | Responsive Bootstrap 5 Admin Dashboard Template</title>
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
      <!-- CSS para los bordes de los cards -->
<style>
#mapid {
    height: 300px; /* Ajusta la altura según tus necesidades */
    width: 100%;   /* Haz que el mapa ocupe todo el ancho del contenedor */
}

/* Estilos adicionales para el card */
.card {
    margin-bottom: 20px; /* Espaciado inferior entre cards */
}

.card-body {
    padding: 20px; /* Ajusta el relleno según sea necesario */
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

               </div>
               
               <div class="col-lg-12 mt-3">
               <div class="card bg-dark">
            <div class="card-header text-center">
                <h1>Enrutamiento</h1>
                <div class="card text-center">
                    <div class="card-body bg-light">
                        <h2>Trazar Ruta</h2>
                        <div id="mapid"></div>
                        <form id="rutaForm">
                            <button type="button" class="btn btn-small btn-info" onclick="obtenerPosicionActual()"><i class="fas fa-compass"></i> Obtener Posición Actual</button>
                            <button type="button" class="btn btn-small btn-info" onclick="iniciarSeleccionDestino()"><i class="fas fa-map-marker-alt"></i> Seleccionar Destino en el Mapa</button>                  
                            <label>Destino:</label>
                            <input type="text" id="destinoInput" placeholder="Latitud, Longitud" readonly>
                            <button type="button" class="btn btn-small btn-info" onclick="calcularRuta()"><i class="fas fa-map"></i> Calcular Ruta</button>
                            <br>
                            <label>Distancia:</label>
                            <input type="text" id="distanciaInput" placeholder="Distancia" readonly>
                            <button type="button" class="btn btn-small btn-success" onclick="confirmarRuta()"><i class="fas fa-paper-plane"></i> Confirmar Ruta</button>
                            <button type="button" class="btn btn-danger" onclick="recargarPagina()"><i class="fas fa-window-close"></i> Eliminar ruta actual</button>
                            <button type="button" class="btn btn-primary" onclick="instrucciones()"><i class="far fa-question-circle"></i> ¿Necesitas Ayuda?</button>

                        </form>
                    </div>
                </div>
            </div>
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
     <!-- Enlace CDN para Leaflet -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js" onerror="handleError()"></script>
<script src="../js/app.js"></script>

     <script>
         $(document).ready(function () {
         			        var table = $('#myTable').DataTable();
         			
         			        $('#searchInput').on('keyup', function () {
         			            table.search(this.value).draw();
         			        });
         			    });
         			
         
      </script>
      
   </body>
</html>