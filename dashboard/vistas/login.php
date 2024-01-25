<?php
$host = "localhost";
$dbname = "scv";
$username = "root";
$password = "123456789";
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$query = "SELECT * FROM usuarios WHERE usuario = :usuario AND Contraseña = :contrasena";
$stmt = $conn->prepare($query);
$stmt->bindParam(':usuario', $usuario);
$stmt->bindParam(':contrasena', $contrasena);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo "Acceso concedido";
} else {
    echo "Error: Usuario o contraseña incorrectos";
}

// Cerrar Conexión
$conn = null;
?>
