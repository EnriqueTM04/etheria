<?php
$host = "clubdeleones.etheria.com.mx"; // Cambia esto si te conectas a un servidor remoto.
$user = "u899317091_admin"; // Usuario de la base de datos.
$password = "Escom2002"; // Contraseña de la base de datos.
$database = "u899317091_clubleones"; // Nombre de la base de datos.

// Crear la conexión
$conn = new mysqli($host, $user, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

echo "Conexión exitosa";
$conn->close();
?>
