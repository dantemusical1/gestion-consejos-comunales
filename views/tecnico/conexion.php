<?php
$servername = "localhost"; // Cambia esto si tu servidor es diferente
$username = "root"; 
$password = ""; 
$dbname = "empresa"; // Nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión exitosa";

// Cerrar conexión
//$conn->close();
?>