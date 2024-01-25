<?php
include "conexion_bd.php";


if (isset($_POST['insertar'])) {
    $usuario = $conexion->real_escape_string($_POST['usuario']);
    $estatus = $conexion->real_escape_string($_POST['estatus_usuario']);
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $apellidoPaterno = $conexion->real_escape_string($_POST['apellido_paterno']);
    $apellidoMaterno = $conexion->real_escape_string($_POST['apellido_materno']);
    $rol  = $conexion->real_escape_string($_POST['rol']);

    // Consulta de inserción
    $sql = "INSERT INTO usuarios (usuario,estatus_usuario, nombre, apellido_paterno, apellido_materno, rol) 
    VALUES ('$usuario', '$estatus', ' $nombre', '$apellidoPaterno', '$apellidoMaterno', '$rol')";

$response = array();

if ($conexion->query($sql)) {
    $id = $conexion->insert_id;
    $response['status'] = 'success';
    $response['message'] = 'Vehículo registrado correctamente.';
} else {
    $response['status'] = 'error';
    $response['message'] = 'Hubo un error al registrar el vehículo.';
}

echo json_encode($response);
}

//Eliminacion 
if(isset($_POST['eliminarRegistro'])) {
    $id = $_POST['id'];
    
    // Consulta de eliminación
    $sql_delete = "DELETE FROM usuarios WHERE id_usuario = $id";
    
    if ($conexion->query($sql_delete) === TRUE) {
        // Envía la respuesta como un JSON
        $response = array('message' => 'Registro con ID '.$id.' eliminado con éxito.');
        echo json_encode($response);
    } else {
        // Envía la respuesta como un JSON
        $response = array('error' => 'Error al eliminar el registro: ' . $conexion->error);
        echo json_encode($response);
    }
}


$conexion->close();
?>





