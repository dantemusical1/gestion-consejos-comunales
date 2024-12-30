<?php
session_start(); // Iniciar la sesión

// Verificar si hay una sesión activa
if (isset($_SESSION['usuarioingresando'])) {
    // Destruir la sesión
    session_unset(); // Eliminar todas las variables de sesión
    session_destroy(); // Destruir la sesión

    // Redirigir al usuario a la página de inicio de sesión o a la página principal
    header("Location: login.php"); // Cambia 'login.php' a la página que desees
    exit(); // Asegúrate de salir después de redirigir
} else {
    // Si no hay sesión activa, redirigir a la página de inicio de sesión
    header("Location: login.php");
    exit();
}
?>