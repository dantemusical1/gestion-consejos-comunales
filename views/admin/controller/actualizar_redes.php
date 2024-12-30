<?php
// actualizar_redes.php

// Conexión a la base de datos
$servername = "localhost"; 
$username = "tu_usuario"; 
$password = "tu_contraseña"; 
$dbname = "tu_base_de_datos"; 

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn_actualiza_redes'])) {
    // Obtener los datos del formulario
    $id_redes = $conn->real_escape_string($_POST['id_redes']);
    $pag_web = $conn->real_escape_string($_POST['pag_web']);
    $facebook = $conn->real_escape_string($_POST['facebook']);
    $whatsapp = $conn->real_escape_string($_POST['whatsapp']);

    // Consulta SQL para actualizar los datos
    $sql = "UPDATE redes SET pag_web='$pag_web', facebook='$facebook', whatsapp='$whatsapp' WHERE id_redes='$id_redes'";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado exitosamente";
        // Redirigir o mostrar un mensaje de éxito
        // header("Location: success.php"); // Redirigir a una página de éxito
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
}

// Cerrar conexión
$conn->close();
?>