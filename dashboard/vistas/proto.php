<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buzón de Correos</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

    <!-- Estilos adicionales -->
    <link href="../css/sidebar.css" rel="stylesheet">
</head>
<style>
   
</style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-3">
            <?php
            // Incluir el archivo sidebar.php
            include '../materials/sidebar.php';
            ?>
        </div>
        <main class="content">
            <div class="container-fluid p-0">
                <div class="col-6 offset-3">
                    <h1>Bandeja de Entrada</h1>
                    <div class="list-group" id="lista-correos">
                        <?php
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

                        $sql = "SELECT id, remitente_id, asunto, mensaje FROM correos";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Mostrar los datos de cada fila
                            while ($row = $result->fetch_assoc()) {
                                echo '<div class="list-group-item d-flex justify-content-between align-items-center">';
                                echo '<span onclick="mostrarCorreo(\'' . $row["remitente_id"] . '\', \'' . $row["asunto"] . '\', \'' . $row["mensaje"] . '\')">' . $row["asunto"] . '</span>';
                                echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verMensajeModal" data-mensaje="' . $row["mensaje"] . '">Ver Mensaje</button>';
                                echo '</div>';
                            }
                        } else {
                            echo "0 resultados";
                        }
                        $conn->close();
                        ?>
                    </div>

                    <h1>Detalles del Correo</h1>
                    <div id="detalles-correo">
                        <!-- Aquí se mostrarán los detalles del correo al hacer clic en uno de los correos de la lista -->
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Modal para responder correos -->
<div class="modal fade" id="responderModal" tabindex="-1" aria-labelledby="responderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="responderModalLabel">Responder Correo</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="enviar_correo.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="destinatario" class="form-label">Destinatario</label>
                        <input type="text" class="form-control" id="destinatario" name="destinatario">
                    </div>
                    <div class="mb-3">
                        <label for="asunto" class="form-label">Asunto</label>
                        <input type="text" class="form-control" id="asunto" name="asunto">
                    </div>
                    <div class="mb-3">
                        <label for="mensaje" class="form-label">Mensaje</label>
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="archivo" class="form-label">Adjuntar archivo</label>
                        <input class="form-control" type="file" id="archivo" name="archivo">
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para ver mensaje -->
<div class="modal fade" id="verMensajeModal" tabindex="-1" aria-labelledby="verMensajeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verMensajeModalLabel">Mensaje</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="mensajeModalBody">
                <!-- Aquí se mostrará el mensaje al hacer clic en el botón "Ver Mensaje" -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function mostrarCorreo(remitente, asunto, mensaje) {
        var detallesCorreo = document.getElementById('detalles-correo');
        detallesCorreo.innerHTML = '<div class="card"><div class="card-header">' + remitente + '</div><div class="card-body"><h5 class="card-title">' + asunto + '</h5><p class="card-text">' + mensaje + '</p><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#responderModal">Responder</button></div></div>';
    }

    // Actualiza el contenido del modal de ver mensaje con el mensaje correspondiente
    $('#verMensajeModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botón que activó el modal
        var mensaje = button.data('mensaje'); // Extrae el valor del atributo data-mensaje
        var modal = $(this);
        modal.find('.modal-body #mensajeModalBody').text(mensaje);
    });
</script>

<!-- ... -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function mostrarCorreo(remitente, asunto, mensaje) {
        var detallesCorreo = document.getElementById('detalles-correo');
        detallesCorreo.innerHTML = '<div class="card"><div class="card-header">' + remitente + '</div><div class="card-body"><h5 class="card-title">' + asunto + '</h5><p class="card-text">' + mensaje + '</p><a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#responderModal">Responder</a></div></div>';
    }
</script>

</body>
</html>











