<?php
// Conexión a la base de datos
include('../../../config/conexion.php');

session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Debes iniciar sesión para cambiar la contraseña.'); window.location= '../index.html';</script>";
    exit();
}

// Inicializar variables
$nueva_contrasena = isset($_POST["nueva_contrasena"]) ? $_POST["nueva_contrasena"] : '';
$confirmar_contrasena = isset($_POST["confirmar_contrasena"]) ? $_POST["confirmar_contrasena"] : '';

// Verificar que las contraseñas coincidan
if ($nueva_contrasena !== $confirmar_contrasena) {
    echo "<script>alert('Las contraseñas no coinciden.'); window.location= 'cambiar_contrasena.php';</script>";
    exit();
}

// Hashear la nueva contraseña
$hashed_password = password_hash($nueva_contrasena, PASSWORD_DEFAULT);

// Actualizar la contraseña en la base de datos
$user_id = $_SESSION['user_id'];
$query = "UPDATE login SET pass = ?, pass_plain = ? WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssi", $hashed_password, $nueva_contrasena, $user_id); // Bind para pass, pass_plain y user_id

if ($stmt->execute()) {
    echo "<script>alert('Contraseña actualizada exitosamente.'); window.location= '../index.php';</script>";
} else {
    echo "<script>alert('Error al actualizar la contraseña.'); window.location= '../formularios/actualizar_clave_admin.php';</script>";
}

// Cerrar la declaración y la conexión
$stmt->close();
$conn->close();
?>