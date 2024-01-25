<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "scv";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener las solicitudes
$query = "SELECT nombre_Chofer, fecha_solicitud, razon_solicitud FROM tabla_solicitudes";
$result = $conn->query($query);

$solicitudes = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $solicitudes[] = $row;
    }
}

// Cerrar conexión
$conn->close();

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($solicitudes);
?>
