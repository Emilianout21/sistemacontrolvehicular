<?php
require 'conexion_bd.php';

$marca = $conexion->real_escape_string($_POST['marca']);
$modelo = $conexion->real_escape_string($_POST['modelo']);
$anio = $conexion->real_escape_string($_POST['anio']);
$placas = $conexion->real_escape_string($_POST['placas']);
$km = $conexion->real_escape_string($_POST['kilometraje']);
$tipo = $conexion->real_escape_string($_POST['tipo']);
$numserie = $conexion->real_escape_string($_POST['numero_serie']);
$estatus = $conexion->real_escape_string($_POST['estatus']);

$sql = "INSERT INTO usuarios (Marca, Modelo, Año, Placas, Kilometraje, Tipo_Vehiculo, Numero_serie, estatus_vehiculo) 
VALUES ('$marca', '$modelo', '$anio', '$placas', '$km', '$tipo', '$numserie', '$estatus')";

if($conexion->query($sql)){
    $id = $conexion->insert_id;
}
header('Location: ../vistas/gestion_vehicular.php')

?>