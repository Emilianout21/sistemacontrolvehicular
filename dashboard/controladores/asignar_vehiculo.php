<?php
include "../controladores/conexion_bd.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id_chofer = $_POST["asignarChofer"];
    $idVehiculoSeleccionado = $_POST["idVehiculoSeleccionado"];
    $fecha_inicio = $_POST["asignarFecha"];
    $hora_inicio = $_POST["asignarHora"];
    // Repite para otros campos

    // Actualizar los datos en la base de datos
    $query = "INSERT INTO asignacion_vehicular (id_usuario, id_vehiculo, fecha_inicio, hora_inicio, estatus)
    VALUES ('$id_chofer', '$idVehiculoSeleccionado', '$fecha_inicio', '$hora_inicio', '1')";

    $response = array();

    if ($conexion->query($query)) {
        $id = $conexion->insert_id;
        $response['status'] = 'success';
        $response['message'] = 'Vehículo asignado correctamente';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Hubo un error al asignar el vehículo.';
    }
}
    echo json_encode($response);
?>
