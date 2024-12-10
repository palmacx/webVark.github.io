<?php
session_start();

// Verificar si la sesión contiene un usuario
if (!isset($_SESSION['idus'])) {
    die("No se encontró un usuario en sesión. Inicia sesión para continuar.");
}

// Validar que se reciban los datos requeridos desde el formulario
if (!isset($_POST['tipoPrincipal']) || !isset($_POST['tipoSecundario'])) {
    die("Faltan datos del tipo de aprendizaje.");
}

// Configuración de conexión a la base de datos
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

// Recuperar los datos de la sesión y del formulario
$idus = intval($_SESSION['idus']); // Convertir a entero por seguridad
$tipoPrincipal = $conn->real_escape_string($_POST['tipoPrincipal']); // Evitar inyecciones SQL
$tipoSecundario = $conn->real_escape_string($_POST['tipoSecundario']); // Evitar inyecciones SQL

// Verificar si el usuario existe en la tabla usuarios (opcional)
$usuarioValido = false;
$checkUsuario = $conn->prepare("SELECT COUNT(*) FROM usuarios WHERE idus = ?");
$checkUsuario->bind_param("i", $idus);
$checkUsuario->execute();
$checkUsuario->bind_result($usuarioValido);
$checkUsuario->fetch();
$checkUsuario->close();

if (!$usuarioValido) {
    die("El usuario no existe en la base de datos.");
}

// Insertar los resultados en la tabla resultados
$sql = "INSERT INTO resultados (idus, tipoPrincipal, tipoSecundario) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

$stmt->bind_param("iss", $idus, $tipoPrincipal, $tipoSecundario);

if ($stmt->execute()) {
    echo "Resultado guardado exitosamente.";
} else {
    echo "Error al guardar el resultado: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
