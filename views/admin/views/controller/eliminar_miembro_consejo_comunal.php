<?php
include('../../../../config/conexion.php');

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del miembro a eliminar desde la URL
if (isset($_GET['id'])) {
    $id_miembro = (int)$_GET['id']; // Convertir a entero para evitar inyecciones SQL

    // Preparar la consulta SQL
    $sql = "DELETE FROM miembro_consejo_comunal WHERE id_miembro = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("i", $id_miembro);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Redirigir a la página principal con un mensaje de éxito
        header("Location:../mostrar_miembros_consejo_comunal.php?mensaje=Miembro eliminado con éxito");
        exit();
    } else {
        // Redirigir a la página principal con un mensaje de error
        header("Location: miembros.php?mensaje=Error al eliminar el miembro: " . $stmt->error);
        exit();
    }

    // Cerrar la declaración
    $stmt->close();
} else {
    // Redirigir a la página principal si no se proporciona un ID
    header("Location: miembros.php?mensaje=ID no proporcionado");
    exit();
}

// Cerrar conexión
$conn->close();
?>