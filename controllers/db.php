<?php
$servername = "localhost";
$username = "root"; // Usuario de la base de datos
$password = "S3rv1t3l4dm1n//"; // Escapa las barras inclinadas dobles
$dbname = "pentland"; // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>