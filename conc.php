<?php
// Configuración de cookies de sesión
session_set_cookie_params([
    'lifetime' => 0, // La cookie se eliminará al cerrar el navegador
    'path' => '/',
    'domain' => '', // Deja vacío para el dominio actual
    'secure' => true, // Asegúrate de que sea true si usas HTTPS
    'httponly' => true, // No permite el acceso a través de JavaScript
    'samesite' => 'Strict' // Previene el envío de cookies en solicitudes cruzadas
]);

// Iniciar la sesión
session_start();

// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gdstest";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$correo = $_POST['co'];
$contrasena = $_POST['contra'];

// Consultar la base de datos
$sql = "SELECT * FROM usuarios WHERE Correo = '$correo' AND Contrasena = '$contrasena'";
$result = $conn->query($sql);

// Verificar si se encontró un registro
if ($result->num_rows == 1) {
    // Inicio de sesión exitoso
    session_regenerate_id(true); // Regenera el ID de sesión para evitar la fijación de sesión
    $_SESSION['correo'] = $correo;
    $_SESSION['loggedin'] = true;

    // Redireccionar a la página de inicio
    header("Location: inicio.html");
    exit;
} else {
    // Inicio de sesión fallido
    echo "<p style='color: red; font-weight: bold;'>Usuario o contraseña incorrectos. Por favor, intenta nuevamente. <a href='index.php'>Volver a intentarlo</a></p>";
}

// Cerrar la conexión
$conn->close();
?>
