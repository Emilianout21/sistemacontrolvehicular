<?php
require 'conexion_bd.php';

$sql = "SELECT a.id_solicitud, b.nombre, a.asunto, a.mensaje, a.fecha FROM solicitudes AS a INNER JOIN usuarios as b ON a.id_remitente = b.id_usuario";

$resultado = $conexion->query($sql);

if($resultado->num_rows > 0){
    while ($row = $resultado->fetch_assoc()){
        $id_solicitud = isset($row["id_solicitud"]) ? $row["id_solicitud"] : "";
        $nombre = isset($row["nombre"]) ? $row["nombre"] : "";
        $asunto = isset($row["asunto"]) ? $row["asunto"] : "";
        $fecha = isset($row["fecha"]) ? $row["fecha"] : "";

        echo "<a href='#' class='list-group-item list-group-item-action' onclick='mostrarCorreo($id_solicitud)'>";
        echo "<div class='d-flex w-100 justify-content-between'>";
        echo "<small>$fecha</small>";
        echo "</div>";
        echo "<div class='d-flex w-100 justify-content-between align-items-center'>";
        // Agrega la imagen del remitente (asumiendo que tienes la URL de la foto en la variable $foto_remitente)
        echo "<img src='../materials/GOD.png' alt='Foto Remitente' class='rounded-circle' width='40' height='40'>";
        echo "<h5 class='mb-1 mx-2'>$nombre</h5>";
        echo "<h6 class='mb-1'>Asunto: $asunto</h6>";
        echo "</div>";
        echo "</a>";
    
    }
} else {
    echo "<p class='list-group-item'>No se encontraron correos.</p>";
}
$conexion->close();
?>
