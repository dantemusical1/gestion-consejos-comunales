<?php
session_start(); 

include("../conexion.php"); 

// Obtener el usuario ingresado y el ID del usuario a eliminar
$usuarioingresado = $_SESSION['usuarioingresando'];
$id_usu = $_GET['id'] ?? null; 

// Verificar si el ID del usuario a eliminar fue proporcionado
if ($id_usu === null) {
    echo "<script>alert('ID de usuario no proporcionado.'); window.location='usuarios_tabla.php';</script>";
    exit();
}



/**AQui hay que hacer unas correcciones */



// Consultar el correo del usuario a eliminar
$result = mysqli_query($conn, "SELECT usu FROM login WHERE id='$id_usu'");
if ($result) {
    $row = mysqli_fetch_assoc($result);

    $usuario = $row['usu'] ?? null; // Obtener usuario

    // Verificar si  coincide con el usuario ingresado
    if ($usuario == $usuarioingresado) {
        echo "<script>alert('No puedes eliminar a tu propio usuario.'); window.location='usuarios_tabla.php';</script>";
        exit();
    } else {
        // Preparar la consulta para eliminar el usuario
        $stmt = $conn->prepare("DELETE FROM login WHERE id = ?");
        $stmt->bind_param("i", $id_usu); // "i" indica que el parámetro es un entero

        // Ejecutar la consulta
        if ($stmt->execute()) {
            header("Location: tabla_usuarios.php");
            exit();
        } else {
            echo "<script>alert('Error al eliminar el usuario: " . $stmt->error . "'); window.location='usuarios_tabla.php';</script>";
            exit();
        }

        // Cerrar la declaración
        $stmt->close();
    }
} else {
    echo "<script>alert('Error al consultar el usuario.'); window.location='usuarios_tabla.php';</script>";
}

// Cerrar la conexión
$conn->close();
?>