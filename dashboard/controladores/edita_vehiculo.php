<?php
include "../controladores/conexion_bd.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id = $_POST["updateId"];
    $marca = $_POST["updateMarca"];
    $modelo = $_POST["updateModelo"];
    $placas = $_POST["updatePlacas"];
    $numSerie = $_POST["updateNumSerie"];
    $tipo = $_POST["updateTipo"];
    $estatus = $_POST["updateEstatus"];
    // Repite para otros campos

    // Actualizar los datos en la base de datos
    $query = "UPDATE vehiculos SET Marca='$marca', Modelo='$modelo', Placas='$placas', Tipo_Vehiculo='$tipo', Numero_serie='$numSerie', estatus_vehiculo='$estatus' WHERE id_vehiculo = $id";

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
