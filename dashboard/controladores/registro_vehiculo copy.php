<?php
include "conexion_bd.php";

if (isset($_POST['insertar'])) {
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $anio = $_POST['anio'];
    $placas = $_POST['placas'];
    $km = $_POST['kilometraje'];
    $tipo = $_POST['tipo'];
    $numserie = $_POST['numero_serie'];
    $estatus = $_POST['estatus'];

    // Consulta de inserción
    $sql = "INSERT INTO vehiculos (Marca, Modelo, Año, Placas, Kilometraje, Tipo_Vehiculo, Numero_serie, estatus_vehiculo) 
    VALUES ('$marca', '$modelo', '$anio', '$placas', '$km', '$tipo', '$numserie', '$estatus')";

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
    $sql_delete = "DELETE FROM vehiculos WHERE id_vehiculo = $id";
    
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
//modiifcacion 
if(isset($_POST['modificar'])){
    $id = $_POST['id']; // Asegúrate de tener un campo de ID en tu formulario
    $sql = "UPDATE vehiculos SET Marca='$marca', Modelo='$modelo', Año='$anio', Placas='$placas', Kilometraje='$km', Tipo_Vehiculo='$tipo', Numero_serie='$numserie', estatus_vehiculo='$estatus' WHERE id_vehiculo = $id";

    if ($conexion->query($sql) === TRUE) {
        echo 'success';
    } else {
        echo 'error';
    }
}


$conexion->close();
?>



