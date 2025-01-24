<?php
// Incluir la conexión a la base de datos
include('../../../../config/conexion.php');
// Verificar si se ha enviado el ID de entrega
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_entrega'])) {
    $id_entrega = trim($_POST['id_entrega']);

    // Obtener los datos actuales de la entrega
    $stmt = $conn->prepare("SELECT * FROM historial_entregas_cilindros WHERE id_entrega = ?");
    $stmt->bind_param("i", $id_entrega);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No se encontró el registro.";
        exit;
    }
} else {
    echo "ID de entrega no proporcionado.";
    exit;
}

// Procesar la actualización si se envía el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['actualizar'])) {
    // Obtener los datos del formulario
    $id_entrega = trim($_POST['id_entrega']);
    $id_miembro = trim($_POST['id_miembro']);
    $id_jefe_familia = trim($_POST['id_jefe_familia']);
    $fecha_entrega = trim($_POST['fecha_entrega']);
    $nro_casa = trim($_POST['nro_casa']);
    $detalles = trim($_POST['detalles']);
    $id_cilindro = trim($_POST['id_cilindro']);

    // Preparar la consulta SQL para actualizar el registro
    $stmt = $conn->prepare("UPDATE historial_entregas_cilindros SET id_miembro = ?, id_jefe_familia = ?, fecha_entrega = ?, nro_casa = ?, detalles = ?, id_cilindro = ? WHERE id_entrega = ?");
    $stmt->bind_param("iissssi", $id_miembro, $id_jefe_familia, $fecha_entrega, $nro_casa, $detalles, $id_cilindro, $id_entrega);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Redirigir a la página anterior o a una página de éxito
        header("Location: historial_entregas.php?mensaje=Registro actualizado exitosamente");
        exit();
    } else {
        echo "Error al actualizar el registro: " . $stmt->error;
    }

    // Cerrar la declaración
    $stmt->close();
}

// Cerrar conexión
$conn->close();
?>

<!-- Formulario para modificar la entrega -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Entrega</title>
<link rel="stylesheet" href="../../../../node_modules/bootstrap/dist/css/bootstrap.css">
</head>
<body>
<div class="container">
<div class="row justify-content-center pt-1 mt-5">
                <div class="col-md-5 formulario">
                    <div class="card">
                        <div class="card-header">
    <h2>Modificar Entrega de Cilindros</h2>
                        </div>
    <div class="card-body pt-5">
    <form method="post" action="modificar_entrega.php">
        <input type="hidden" name="id_entrega" value="<?php echo htmlspecialchars($row['id_entrega']); ?>">
        
        <div class="mb-3">
            <label for="id_miembro">Miembro responsable de la entrega</label>
            <input type="text" class="form-control" name="id_miembro" value="<?php echo htmlspecialchars($row['id_miembro']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="id_jefe_familia">ID Jefe de Familia</label>
            <input type="text" class="form-control" name="id_jefe_familia" value="<?php echo htmlspecialchars($row['id_jefe_familia']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="fecha_entrega">Fecha de Entrega</label>
            <input type="date" class="form-control" name="fecha_entrega" value="<?php echo htmlspecialchars($row['fecha_entrega']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="nro_casa">Número de Casa</label>
            <input type="text" class="form-control" name="nro_casa" value="<?php echo htmlspecialchars($row['nro_casa']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="detalles">Detalles</label>
            <textarea class="form-control" name="detalles" required><?php echo htmlspecialchars($row['detalles']); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="id_cilindro">ID Cilindro</label>
            <input type="text" class="form-control" name="id_cilindro" value="<?php echo htmlspecialchars($row['id_cilindro']); ?>" required>
        </div>

        <button type="submit" name="actualizar" class="btn btn-primary">Actualizar</button>
        <a href="historial_entregas.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
                        </div>
                    </div>
                </div>
</body>
</html>