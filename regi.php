<?php
include 'db_connection.php'; // Incluir la conexión a la base de datos

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO usuarios (Nombre, Apellidos, Edad, Correo, Contrasena) VALUES ('$nombre', '$apellido', '$edad', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: inicio.html");
        exit;
    } else {
        echo "Error al registrar usuario: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
