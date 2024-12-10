<?php
session_start(); // Asegúrate de iniciar la sesión al principio

// Ejemplo de validación de usuario
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gdstest";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar credenciales
$sql = "SELECT idus FROM usuarios WHERE usuario = ? AND contrasena = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $usuario, $contrasena);
$stmt->execute();
$stmt->bind_result($idus);
$stmt->fetch();

if ($idus) {
    $_SESSION['idus'] = $idus; // Guardar el id del usuario en la sesión
    echo "Inicio de sesión exitoso. ID Usuario: " . $idus;
} else {
    echo "Usuario o contraseña incorrectos.";
}

$stmt->close();
$conn->close();
?>
