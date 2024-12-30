<?php
// registrar_redes.php

// Conexión a la base de datos
$servername = "localhost"; // Cambia esto si es necesario
$username = "root"; // Cambia esto por tu usuario de base de datos
$password = ""; // Cambia esto por tu contraseña de base de datos
$dbname = "empresa"; // Cambia esto por el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn_registra_redes'])) {
    // Obtener los datos del formulario
    $pag_web = $conn->real_escape_string($_POST['pag_web']);
    $facebook = $conn->real_escape_string($_POST['facebook']);
    $whatsapp = $conn->real_escape_string($_POST['whatsapp']);

    // Consulta SQL para insertar los datos
    $sql = "INSERT INTO redes (pag_web, facebook, whatsapp) VALUES ('$pag_web', '$facebook', '$whatsapp')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso";
        // Redirigir o mostrar un mensaje de éxito
        // header("Location: success.php"); // Redirigir a una página de éxito
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar conexión
$conn->close();
?>