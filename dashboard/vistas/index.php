<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SCV</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script>
        function mostrarAlerta(mensaje) {
            alert(mensaje);
        }

        function validarFormulario() {
            var usuario = document.getElementsByName("usuario")[0].value;
            var contrasena = document.getElementsByName("contrasena")[0].value;

            if (usuario === "" || contrasena === "") {
                mostrarAlerta("Por favor, ingresa usuario y contraseña.");
                return false;
            }

            // Otros controles de validación si es necesario

            return true;
        }
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="card">
            <img src="Imagen1.png" alt="Logo" class="logo">
            <form action="login.php" method="POST" onsubmit="return validarFormulario()">
                <h1>Iniciar Sesión</h1>
                <div class="input-box">
                    <input type="text" name="usuario" placeholder="Usuario" required>
                    <i class='bx bxs-user-circle'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="contrasena" placeholder="Contraseña" required>
                    <i class='bx bxs-lock'></i>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox" name="recordar_usuario">Recordar Usuario</label>
                    <a href="#" class="forgot-link" onclick="mostrarMensajeOlvido()">¿Olvidaste tu contraseña?</a>
                </div>
                <button type="submit" class="btn">Ingresar</button>
                <p id="mensaje-olvido" style="color: #000;"></p>
            </form>
        </div>
    </div>

    <script>
        function mostrarMensajeOlvido() {
            var mensajeOlvido = "En caso de olvidar la contraseña, diríjase a administración.";
            document.getElementById("mensaje-olvido").innerText = mensajeOlvido;
        }
    </script>
</body>
</html>
