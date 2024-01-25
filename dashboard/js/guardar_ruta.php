<?php
// Conexión a la base de datos (actualiza con tus propias credenciales)
$servername = "localhost";
$username = "root";
$password = "";
$database = "scv";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos de la solicitud POST
$inicioLat = $_POST['inicioLat'];
$inicioLong = $_POST['inicioLong'];
$destinoLat = $_POST['destinoLat'];
$destinoLong = $_POST['destinoLong'];
$nombre_ruta = $_POST['nombreRuta'];
$distancia = $_POST['distancia'];

// Insertar datos en la base de datos
$sql = "INSERT INTO rutas (nombre_ruta, distancia_km, inicio_lat, inicio_long, destino_lat, destino_long) VALUES ('$nombre_ruta','$distancia', '$inicioLat', '$inicioLong', '$destinoLat', '$destinoLong')";

if ($conn->query($sql) === TRUE) {
    echo "Ruta guardada exitosamente en la base de datos.";
} else {
    echo "Error al guardar la ruta: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

