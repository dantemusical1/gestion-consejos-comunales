<?php
session_start(); // Inicia la sesión

// Destruye la sesión
session_destroy();

// Redirige a la página de inicio (puedes cambiar 'index.php' por la página que desees)
header("Location: index.php");
exit(); // Asegúrate de salir después de redirigir
?>