<?php
include "../controladores/conexion_bd.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id = $_POST["updateId"];
    $usuario = $_POST["updateusuario"];
    $estatus = $_POST["updateestatus"];
    $nombre = $_POST["updatenombre"];
    $apellidoPaterno = $_POST["updateapellidoP"];
    $apellidoMaterno= $_POST["updateapellidoM"];
    $rol = $_POST["updaterol"];
    // Repite para otros campos

    // Actualizar los datos en la base de datos
    $query = "UPDATE usuarios SET usuario='$usuario', estatus_usuario='$estatus', nombre='$nombre', apellido_paterno='$apellidoPaterno', apellido_materno='$apellidoMaterno', rol='$rol' WHERE id_usuario = $id";

    $response = array();

    if ($conexion->query($query)) {
        $id = $conexion->insert_id;
        $response['status'] = 'success';
        $response['message'] = 'Vehículo actualizado correctamente.';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Hubo un error al actualizar el vehículo.';
    }
}
    echo json_encode($response);
?>
