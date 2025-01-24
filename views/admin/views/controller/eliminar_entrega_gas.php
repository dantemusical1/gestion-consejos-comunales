<?php
// Incluir la conexión a la base de datos
include('../../../../config/conexion.php');
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_entrega'])) {
    // Obtener el ID de entrega del formulario
    $id_entrega = trim($_POST['id_entrega']);

    // Preparar la consulta SQL para eliminar el registro
    $stmt = $conn->prepare("DELETE FROM historial_entregas_cilindros WHERE id_entrega = ?");
    $stmt->bind_param("i", $id_entrega); // Suponiendo que id_entrega es un entero

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Redirigir a la página anterior o a una página de éxito
        header("Location: historial_entregas.php?mensaje=Registro eliminado exitosamente");
        exit();
    } else {
        // Manejo de errores
        echo "Error al eliminar el registro: " . $stmt->error;
    }

    // Cerrar la declaración
    $stmt->close();
}

// Cerrar conexión
$conn->close();
?>