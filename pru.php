<?php
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
// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta SQL
$sql = "SELECT * FROM usuarios";

// Ejecutar la consulta
$result = $conn->query($sql);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    // Recorrer los resultados
    while ($row = $result->fetch_assoc()) {
        // Acceder a los datos de cada fila
        $id = $row["IDUsuario"];
        $nombre = $row["Nombre"];
        $apellido = $row["Apellidos"];
        $edad = $row["Edad"];
        $crre = $row["Correo"];

        // Hacer algo con los datos
        echo "Nombre: $nombre, Apellido: $apellido, Edad: $edad<br>";
    }
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión
$conn->close();
?>