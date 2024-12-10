<?php
session_start(); // Iniciar la sesión
include 'db_connection.php'; // Incluir la conexión a la base de datos

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Si el usuario no ha iniciado sesión, redireccionar a la página de inicio de sesión
    header("Location: index.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link rel="icon" href="img/logo.ico">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="img/Vark.ico" height="90px" alt="LogoGDS">
            <p><b>VARK Test</b></p>
        </div>
        <nav class="navegacion">
            <a href="index.html">Inicio</a>
            <a href="cuestionario/cuestionario.html">Test</a>
            <a href="nosotros.html">Sobre nosotros</a>
            <a href="ayuda.html">Ayuda</a>
            <a href="usuario.php" id="inizio"><img src="img/icoperfil.png" height="30px" alt=""></a>
        </nav>
    </header>

    <section class="usuario">
        <div>
            <img src="img/usuarioimg.png" height="200px" alt="" class="imgusuario">
        </div>
        <div class="uuu">
            <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['correo']); ?></h1>
            <p>Si lo deseas puedes cerrar la sesión</p>
            <br>
            <a href="logout.php" class="salir">Cerrar sesión</a>
        </div>
    </section>

    <footer>
        <p>© 2024 VARK Test. Todos los derechos reservados.</p> 
    </footer>
</body>
</html>
