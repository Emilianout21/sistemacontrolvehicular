<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrutamiento</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<!-- Bootstrap CSS -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
	<!-- DataTables CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
	<!-- Encabezado y enlaces CSS -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-1HI6aKafvcptOnFwFqsav46sMYogkRAm++NV6uc8Q+Me8Un9VUrv2QOotLmejjF6rPG2wGx66aP50QiI+o3B9g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-PpKLTOhDHFojJlZ3w0OszIB3Ff1fnP88Cte43ZNsR6Y6F4zP5S4eW7JEhy/KgRHtMj9UbVhRFD6Mvffg+38Zxg==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../assets/css/nairobi.css?v=1.0.0">


    <style>
               .imagen-izquierda {
        margin-left: -70px; 
               }
        #mapid { height: 400px; }

    </style>
</head>
<body class ="">
          <!-- loader Start -->
          <div id="loading">
         <div class="loader zsimple-loader">
            <div class="loader-body"></div>
         </div>
      </div>
      <!-- loader END -->
<?php
// Incluir el archivo sidebar.php
include '../materials/sidebar.php';
?>
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
</div>
<div class="content-wrapper">
    <div class="container-fluid pt-5" style="margin-left: 20px;">
        <div class="card bg-dark">
            <div class="card-header text-center">
                <h1>Enrutamiento</h1>

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
<!-- Modal para ingresar el nombre de la ruta -->
<div class="modal fade" id="nombreRutaModal" tabindex="-1" aria-labelledby="nombreRutaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nombreRutaModalLabel">Nombre de la Ruta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="nombreRutaInput">Ingrese el nombre de la ruta:</label>
                <input type="text" class="form-control" id="nombreRutaInput">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-small btn-danger" data-bs-dismiss="modal"><i class="fas fa-door-closed"></i> Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="guardarRuta()"><i class="fas fa-save"></i> Guardar Ruta</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal instrucciones -->
<div class="modal fade" id="ayudaModal" tabindex="-1" aria-labelledby="ayudaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ayudaTittle"><i class="far fa-question-circle"></i> Intrucciones</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="nombreRutaInput">- Obtener posición actual:</label>
                <label>Haga click en el boton <img src ="../materials/obtener.png" height="30" width = "150" > para obtener su ubicación actual.</label>
				<label for="SeleccionarDestino" class="form-label">- Seleccionar Destino en el Mapa:</label>
                <label>Haga click en el boton <img src ="../materials/seleccionar.png" height="30" width = "180" > para seleccionar un destino del mapa.</label>           
				<label for="CalcularRuta" class="form-label">- Click en calcular ruta:</label>
                <label>Haga click en <img src ="../materials/calcular.png" height="30" width = "120" > para calular la distancia en km entre el punto actual y el destino.</label>
				<label for="CalcularRuta" class="form-label">- Confirmar ruta:</label>
                <label>Para guardar ruta presionar el boton de <img src ="../materials/confirmar.png" height="30" width = "120" >.</label>
				<label for="CalcularRuta" class="form-label">- Eliminar la ruta actual:</label>
                <label>Si desea eliminar la ruta actual solo le tiene que dar click en el boton de <img src ="../materials/eliminar.png" height="30" width = "140" >.</label>
			</div>
    </div>
</div>
</main>

<?php
            // Incluir el archivo sidebar.php
            include '../materials/footer.php';
            ?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js" onerror="handleError()"></script>
<script src="../js/app.js"></script>
<script>
function handleError() {
    console.error('Error cargando Leaflet Routing Machine.');
}
</script>
<script>
    function confirmarRuta() {
        // Obtener las coordenadas del destino desde el campo de entrada
        var destinoInput = document.getElementById('destinoInput').value;
        var [destinoLat, destinoLong] = destinoInput.split(',').map(parseFloat);

        // Verificar si latitud y longitud están definidas
        if (typeof latitud === 'undefined' || typeof longitud === 'undefined') {
            console.error('Las coordenadas de la posición actual no están definidas.');
            return;
        }

        // Abrir el modal para ingresar el nombre de la ruta
        $('#nombreRutaModal').modal('show');
    }
    function recargarPagina() {
        // Recargar la página
        location.reload();
    }
    function instrucciones(){
        $('#ayudaModal').modal('show');
    }
    function guardarRuta() {
        // Obtener el nombre de la ruta desde el input del modal
        var nombreRuta = document.getElementById('nombreRutaInput').value;

        // Verificar si el nombre de la ruta está vacío
        if (!nombreRuta.trim()) {
            alert('Por favor, ingrese un nombre para la ruta.');
            return;
        }

        // Obtener las coordenadas del destino desde el campo de entrada
        var distancia = document.getElementById('distanciaInput').value;
        var destinoInput = document.getElementById('destinoInput').value;
        var [destinoLat, destinoLong] = destinoInput.split(',').map(parseFloat);

        // Envía los datos al controlador PHP mediante AJAX
        $.ajax({
            url: '../js/guardar_ruta.php',
            type: 'POST',
            data: {
                inicioLat: latitud,
                inicioLong: longitud,
                destinoLat: destinoLat,
                destinoLong: destinoLong,
                nombreRuta: nombreRuta,
                distancia: distancia
            },
            success: function(response) {
                console.log(response);
                alert('Ruta confirmada y guardada en la base de datos con el nombre: ' + nombreRuta);
                // Cerrar el modal después de guardar la ruta
                $('#nombreRutaModal').modal('hide');
            },
            error: function(error) {
                console.error('Error al confirmar la ruta:', error);
                alert('Error al confirmar la ruta. Consulta la consola para más detalles.');
                // Cerrar el modal en caso de error
                $('#nombreRutaModal').modal('hide');
            }
        });
    }

    </script>
</body>
</html>


