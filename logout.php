<?php
session_start(); // Iniciar la sesión

// Cerrar la sesión
$_SESSION = []; // Vaciar la sesión
session_destroy(); // Destruir la sesión

// Redireccionar al inicio de sesión
header("Location: index.php");
exit;
?>
