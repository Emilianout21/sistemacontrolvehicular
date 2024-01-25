<!DOCTYPE html>
<html>
<head>
  <title>Mapa de Chetumal</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    h1 {
      color: #8B0000;
      text-align: center;
      margin: 20px 0;
    }

    #map {
      height: 400px;
      width: 100%;
    }
  </style>
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
    <link rel="stylesheet" href="../dist/css/asignar_v2.css">
     <!-- Google Font: Source Sans Pro -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
 
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
<div class="wrapper">


  <!-- Navbar -->
  <?php include 'encabezado.php';?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'menu_lateral1.php';?>
  <!-- /.Main Sidebar Container -->
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <h1>Mapa de Chetumal, Quintana Roo, México</h1>
  <div id="map"></div>

   <script>
    // Arreglo para almacenar la información de los vehículos
    var vehicles = [
      {
        id: 1,
        marca: "Chevrolet",
        modelo: "Aveo",
        lat: 18.511055,
        lng: -88.316197
      },
      {
        id: 2,
        marca: "Nissan",
        modelo: "Versa",
        lat: 18.500637,
        lng: -88.309326
      },
      {
        id: 3,
        marca: "Ford",
        modelo: "F-150",
        lat: 18.497679,
        lng: -88.290024
      },
      {
        id: 4,
        marca: "Chevrolet",
        modelo: "Chevy",
        lat: 18.513055,
        lng: -88.287729
      },
      {
        id: 5,
        marca: "Mazda",
        modelo: "Mazda 3",
        lat: 18.520788,
        lng: -88.281663
      }
    ];

    var map;

    function initMap() {
      // Crear el mapa centrado en Chetumal
      map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 18.500120, lng: -88.291613 },
        zoom: 13
      });

      // Crear marcadores para cada vehículo con icono personalizado
      vehicles.forEach(function (vehicle) {
        vehicle.marker = new google.maps.Marker({
          position: { lat: vehicle.lat, lng: vehicle.lng },
          map: map,
          icon: "car_icon.png", // Aquí debes colocar la ruta de la imagen del carro
          title: `${vehicle.marca} ${vehicle.modelo}`,
          animation: google.maps.Animation.DROP
        });

        // Crear infowindow para mostrar información del vehículo al hacer clic
        var contentString = `<div><strong>${vehicle.marca} ${vehicle.modelo}</strong></div>`;
        vehicle.infowindow = new google.maps.InfoWindow({
          content: contentString
        });

        // Agregar evento clic al marcador para mostrar el infowindow
        vehicle.marker.addListener("click", function () {
          vehicle.infowindow.open(map, vehicle.marker);
        });
      });

      // Llamar a la función para actualizar la posición de los vehículos cada 1 segundo (1000 milisegundos)
      setInterval(updateVehiclePositions, 1000);
    }

    function updateVehiclePositions() {
      // Aquí puedes agregar código para obtener las nuevas posiciones de los vehículos desde tu base de datos o de alguna otra fuente.

      vehicles.forEach(function (vehicle) {
        // Simular el movimiento cambiando ligeramente la latitud y longitud del vehículo
        vehicle.lat += getRandomOffset();
        vehicle.lng += getRandomOffset();

        // Actualizar la posición del marcador en el mapa
        vehicle.marker.setPosition(new google.maps.LatLng(vehicle.lat, vehicle.lng));
      });
    }

    function getRandomOffset() {
      // Esta función devuelve un pequeño desplazamiento aleatorio para simular el movimiento
      // Puedes ajustar el valor de desplazamiento según la velocidad que quieras simular
      return (Math.random() - 0.5) * 0.001;
    }
   // Coloca aquí el código JavaScript anterior para inicializar el mapa y simular el movimiento de los vehículos.
  </script>
 <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<!-- Sweet Alert -->
<script src="../dist/js/sweetalert2.all.min.js"></script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqYBYA3WEvtxHv9Vp2efPNFVXop9itCXA&callback=initMap" async defer></script>
</body>
</html>
