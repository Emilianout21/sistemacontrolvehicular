<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
    <link rel="stylesheet" href="../../assets/css/libs.min.css">
    <link rel="stylesheet" href="../../assets/css/nairobi.css?v=1.0.0"> 
</head>
<body class="" data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div>
    <!-- loader END -->

    <div>
        <div class="wrapper">
            <section class="vh-100">
                <div class="container h-100">
                    <div class="row justify-content-center h-100 align-items-center">
                        <div class="col-md-6">
                            <img src="../../assets/images/auth/10.jpg" class="bottom-img1" alt="images" style="margin-top: -20px;">
                        </div>
                        <div class="col-md-6 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="auth-form">
                                        <h2 class="text-center mb-4">Ingresar</h2>
                                        <?php
session_start();
include "../controladores/conexion_bd.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    $stmt = $conn->prepare("SELECT id_usuario, usuario, clave, foto_perfil FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->bind_result($id_usuario, $dbUsuario, $dbClave, $foto_perfil);

    if ($stmt->fetch() && password_verify($clave, $dbClave)) {
        $_SESSION['usuario_id'] = $id_usuario;
        $_SESSION['usuario'] = $usuario;
        $_SESSION['foto_perfil'] = $foto_perfil;
        header("Location: dashboard.php");
        exit(); 
    } else {
        $_SESSION['error'] = "Usuario o contraseña incorrectos";
        header("Location: login.php");
        exit(); 
    }

    $stmt->close();
}
?>

                                        <form method="post" action=" ">
                                            <p class="text-center">Acceder al sistema</p>
                                            <div class="form-group">
                                                <label for="usuario" class="form-label">Usuario</label>
                                                <input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="email" placeholder="Usuario">
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="password" class="form-label">Clave</label>
                                                    <input type="password" class="form-control" id="password" name="clave" aria-describedby="password" placeholder=" ">
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="Remember">
                                                        <label class="form-check-label" for="Remember">Recordar Usuario</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                <a href="#" class="forgot-link" onclick="mostrarMensajeOlvido()">¿Olvidaste tu contraseña?</a>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">Ingresar</button>
                                            </div>
                                        </form>
                                        <?php
if (isset($_SESSION['error'])) {
    echo '<div class="alert alert-danger mt-3" role="alert">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['error']); // Limpiar el mensaje de error después de mostrarlo
}
?>
                                        <div class="new-account mt-3 text-center">
                                            <p>¿Clave olvidada? <a class="" href="../../dashboard/auth/sign-up.html">Contactar Administración</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Backend Bundle JavaScript -->
    <script src="../../assets/js/libs.min.js"></script>
    <!-- widgetchart JavaScript -->
    <script src="../../assets/js/charts/widgetcharts.js"></script>
    <!-- dashboard JavaScript -->
    <script src="../../assets/js/charts/dashboard.js"></script>

    <!-- fslightbox JavaScript -->
    <script src="../../assets/js/fslightbox.js"></script>
    <!-- app JavaScript -->
    <script src="../../assets/js/app.js"></script>
    <!-- apexchart JavaScript -->
    <script src="../../assets/js/charts/apexcharts.js"></script>
    <!-- countdown JavaScript -->
    <script src="../../assets/js/countdown.js" ></script>
</body>
</html>
