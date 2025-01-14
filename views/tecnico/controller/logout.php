<?php
// Iniciar la sesión
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Si se desea destruir la sesión completamente, se puede usar session_destroy()
session_destroy();

// Redirigir al usuario a la página de inicio o a la página de login
header("Location: index.php"); // Cambia 'index.php' por la página a la que quieras redirigir
exit();
?>