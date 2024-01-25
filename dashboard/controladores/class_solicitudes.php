<?php
require 'conexion_bd.php';

if (isset($_GET['id_solicitud'])) {
    $id_solicitud = intval($_GET['id_solicitud']);

    $sql = "SELECT b.nombre, a.id_remitente, a.asunto, a.mensaje, a.fecha FROM solicitudes a INNER JOIN usuarios b ON a.id_remitente = b.id_usuario WHERE a.id_solicitud = $id_solicitud";

    $resultado = $conexion->query($sql);

    if ($resultado->num_rows) {
        while ($row = $resultado->fetch_assoc()) {
            $asunto = $row['asunto'];
            $id_remitente = $row['id_remitente'];
            $nombre = $row['nombre'];
            $mensaje = $row['mensaje'];
            $fecha = $row['fecha'];

            // Muestra el contenido directamente
            echo "<h6 class='card-title' style='color:black;'>Asunto: $asunto</h6>";
            echo "<input type='hidden' name='remitente' id='remitente' value='$id_remitente'>";
            echo "<h6 class='card-text ' style='color:black;'>Remitente: $nombre</h6>";
            echo "<h6 class='card-text' style='color:black;'>$mensaje</h6>";
            echo "<button class='btn btn-primary' onclick='asignarVehiculoModal()'><i class='fas fa-car'></i> Asignar Vehiculo</button>";
        }
    } else {
        echo json_encode(array('error' => 'Solicitud no encontrada'));
    }

    $conexion->close();
} else {
    // Si no se proporcionó un ID de solicitud, devuelve un mensaje de error
    echo json_encode(array('error' => 'ID de solicitud no proporcionado'));
}
?>
