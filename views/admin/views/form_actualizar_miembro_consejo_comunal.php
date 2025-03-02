<?php
// Obtener el ID del miembro desde la URL
$id_miembro = isset($_GET['id']) ? $_GET['id'] : null;

// Verificar si el ID está presente
if ($id_miembro === null) {
    echo "ID de miembro no proporcionado.";
    exit;
}



include('../../../config/conexion.php');

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener los datos del miembro
$sql = "SELECT * FROM miembro_consejo_comunal WHERE id_miembro = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_miembro);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Miembro no encontrado.";
    exit;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="estilo_tabla_miembros_cc.css">
    <link rel="shortcut icon" href="../../../asset/logoclap.jpg" />
    <title>Actualizar Miembros del Consejo Comunal</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Actualizar Miembro del Consejo Comunal</h2>
        <form action="controller/actualizar_miembro_consejo_comunal.php" method="POST">
            <input type="hidden" name="id_miembro" id="id_miembro" value="<?php echo $row['id_miembro']; ?>">
            <table class="table table-dark table-hover">
                <tbody>
                    <tr>
                        <td><label for="primer_nombre">Primer Nombre</label></td>
                        <td><input type="text" class="form-control" id="primer_nombre" name="primer_nombre" value="<?php echo $row['primer_nombre']; ?>" required></td>
                        <td><label for="segundo_nombre">Segundo Nombre</label></td>
                        <td><input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre" value="<?php echo $row['segundo_nombre']; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="primer_apellido">Primer Apellido</label></td>
                        <td><input type="text" class="form-control" id="primer_apellido" name="primer_apellido" value="<?php echo $row['primer_apellido']; ?>" required></td>
                        <td><label for="segundo_apellido">Segundo Apellido</label></td>
                        <td><input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" value="<?php echo $row['segundo_apellido']; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="cedula">Cédula</label></td>
                        <td><input type="text" class="form-control" id="cedula" name="cedula" value="<?php echo $row['cedula']; ?>" required></td>
                        <td><label for="nro_casa">Número de Casa</label></td>
                        <td><input type="text" class="form-control" id="nro_casa" name="nro_casa" value="<?php echo $row['nro_casa']; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="direccion">Dirección</label></td>
                        <td colspan="4"><input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $row['direccion']; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email</label></td>
                        <td><input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>"></td>
                        <td><label for="telefono">Teléfono</label></td>
                        <td><input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $row['telefono']; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="cargo">Cargo</label></td>
                        <td>
                            <select class="form-control" id="cargo" name="cargo" required>
                                <option value="Vocal" <?php if ($row['cargo'] === 'Vocal') echo 'selected'; ?>>Vocero</option>
                                <option value="Coordinador" <?php if ($row['cargo'] === 'Coordinador') echo 'selected'; ?>>Coordinador</option>
                                <option value="Secretario" <?php if ($row['cargo'] === 'Secretario') echo 'selected'; ?>>Secretario</option>
                                <option value="Tesorero" <?php if ($row['cargo'] === 'Tesorero') echo 'selected'; ?>>Tesorero</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Actualizar Miembro</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="../../../node_modules/@popperjs/core/dist/umd/popper.js"></script>
</body>
</html>