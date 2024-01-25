<?php
// Conexión a la base de datos (actualiza con tus propias credenciales)
$servername = "localhost";
$username = "root";
$password = "";
$database = "scv";

$conexion = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Consulta para obtener las coordenadas de las rutas
$query = "SELECT inicio_lat, inicio_long, destino_lat, destino_long FROM rutas";
$resultado = $conexion->query($query);

// Crear un array para almacenar las coordenadas
$rutas = array();

// Obtener las coordenadas de la consulta
while ($fila = $resultado->fetch_assoc()) {
    $ruta = array(
        'inicio' => array('lat' => $fila['inicio_lat'], 'lng' => $fila['inicio_long']),
        'destino' => array('lat' => $fila['destino_lat'], 'lng' => $fila['destino_long'])
    );
    array_push($rutas, $ruta);
}

// Cerrar la conexión a la base de datos
$conexion->close();

// Devolver las coordenadas en formato JSON
echo json_encode($rutas);
?>
