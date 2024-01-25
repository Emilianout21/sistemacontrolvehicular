<?php
// Procesar el formulario de envío de correo

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "buzon_correos";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

    // Recuperar datos del formulario
    $destinatario = $_POST['destinatario'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    // Aquí debes implementar la lógica para enviar el correo a través de PHP
    // Puedes usar la función mail() de PHP o una biblioteca de correo electrónico como PHPMailer

    // Por ejemplo, podrías usar la función mail() de la siguiente manera:
    $remitente = "tu_correo@ejemplo.com";
    $cabeceras = "From: $remitente";

    if (mail($destinatario, $asunto, $mensaje, $cabeceras)) {
        echo "Correo enviado con éxito.";
    } else {
        echo "Error al enviar el correo.";
    }

    $conn->close();
}
?>
