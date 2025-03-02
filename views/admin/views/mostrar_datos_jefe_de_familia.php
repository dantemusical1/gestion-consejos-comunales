<?php
include('../../../config/conexion.php');

// Obtener el ID del jefe de familia desde la URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Consulta para obtener los datos del jefe de familia
$query = "SELECT primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, direccion FROM jefes_familia WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Datos jefe de familia</title>
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css">  
</head>
<body>
<div class="container">
    <div class="row">
        <div class="pt-3 pb-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Datos del jefe de familia</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Información Personal</h6>
                    <p class="card-text"><strong>Nombre:</strong> <?php echo htmlspecialchars($row['primer_nombre'] . ' ' . $row['segundo_nombre'] . ' ' . $row['primer_apellido'] . ' ' . $row['segundo_apellido']); ?></p>
                    <p class="card-text"><strong>Dirección:</strong> <?php echo htmlspecialchars($row['direccion']); ?></p>
                </div>
            </div>
        </div>

        <table class="table table-hover">
            <thead>   
                <tr>
                    <th>Descripción</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Actualizar datos jefe de familia</td>
                    <td><a class="btn btn-success" href="../formularios/form_actualizar_jefe_familia.php?id=<?php echo htmlspecialchars($id); ?>" role="button"><i class="bi bi-people-fill"></i> Agregar</a></td>
                </tr>
                <tr>
                    <td>Agregar Nuevo familiar</td>
                    <td><a class="btn btn-success" href="../formularios/form_agregar_nuevo_familiar.php?id=<?php echo htmlspecialchars($id); ?>" role="button"><i class="bi bi-people-fill"></i> Agregar</a></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row">
    <h2 class="text-center">Datos de familiares</h2>
    <div class="pt-3 pb-3">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cédula</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Consulta para obtener los miembros de la familia filtrados por el ID del jefe de familia
                $sql = "SELECT `id`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `cedula` FROM miembros_familia WHERE id_jefe_familia = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id); // Asegúrate de que $id es el ID del jefe de familia
                $stmt->execute();
                $result = $stmt->get_result();

                // Verificar si hay resultados
                if ($result->num_rows > 0) {
                    // Iterar sobre los resultados y mostrarlos en la tabla
                    while ($miembro = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($miembro['primer_nombre'] . ' ' . $miembro['segundo_nombre']) . "</td>";
                        echo "<td>" . htmlspecialchars($miembro['primer_apellido'] . ' ' . $miembro['segundo_apellido']) . "</td>";
                        echo "<td>" . htmlspecialchars($miembro['cedula']) . "</td>"; // Mostrar la cédula
                        echo "<td><a href='editar.php?id=" . $miembro['id'] . "' class='btn btn-primary'>Editar</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>No hay familiares registrados.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div>

<script src="../../../node_modules/jquery/dist/jquery.js"></script>
<script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
<script src="../../../node_modules/@popperjs/core/dist/umd/popper.js"></script>

</body>
</html>

<?php
// Cerrar la declaración de la consulta y la conexión
$stmt->close();
$conn->close();
?>