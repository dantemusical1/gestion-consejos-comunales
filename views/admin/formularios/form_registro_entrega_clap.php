<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Aquí inicia los módulos globales -->
    <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.css">
    <title>Registro de Entrega de Cilindros de Gas</title>
</head>
<body>
<?php
include('menu-retroceder.php');
?>

<div class="container">
    <div class="row justify-content-center pt-1 mt-5">
        <div class="col-md-6 formulario">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center card-title">Modificar Entrega de Cilindros</h2>
                </div>
                <div class="card-body pt-5">
                    <form method="post" action="controller/agregar_entrega_cilindro.php">
                        <input type="hidden" name="id_entrega" value="<?php echo htmlspecialchars($row['id_entrega']); ?>">
                        
                        <div class="mb-3">
    <label for="id_miembro" class="form-label">Miembro responsable de la entrega</label>
    <select class="form-select" name="id_miembro" required>
        <option value="" disabled selected>Seleccione un miembro</option>
        <?php
        // Conexión a la base de datos
        include('../../../config/conexion.php'); 

        // Consulta para obtener los miembros
        $query = "SELECT id_miembro, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido FROM miembro_consejo_comunal";
        $result = mysqli_query($conn, $query);

        // Verifica si la consulta fue exitosa
        if ($result) {
            // Verifica si hay resultados y genera las opciones
            if (mysqli_num_rows($result) > 0) {
                while ($miembro = mysqli_fetch_assoc($result)) {
                    // Concatenar nombres y apellidos
                    $nombreCompleto = htmlspecialchars($miembro['primer_nombre']) . ' ' . 
                                      htmlspecialchars($miembro['segundo_nombre']) . ' ' . 
                                      htmlspecialchars($miembro['primer_apellido']) . ' ' . 
                                      htmlspecialchars($miembro['segundo_apellido']);
                    echo '<option value="' . htmlspecialchars($miembro['id_miembro']) . '">' . $nombreCompleto . '</option>';
                }
            } else {
                echo '<option value="" disabled>No hay miembros disponibles</option>';
            }
        } else {
            // Manejo de errores en caso de que la consulta falle
            echo '<option value="" disabled>Error al obtener miembros</option>';
        }

        // Cierra la conexión a la base de datos
        mysqli_close($conn);
        ?>
    </select>
</div>
                        <div class="mb-3">
                            <label for="id_jefe_familia" class="form-label">ID Jefe de Familia</label>
                            <input type="text" class="form-control" name="id_jefe_familia" value="<?php echo htmlspecialchars($row['id_jefe_familia']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="fecha_entrega" class="form-label">Fecha de Entrega</label>
                            <input type="date" class="form-control" name="fecha_entrega" value="<?php echo htmlspecialchars($row['fecha_entrega']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="nro_casa" class="form-label">Número de Casa</label>
                            <input type="text" class="form-control" name="nro_casa" value="<?php echo htmlspecialchars($row['nro_casa']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="detalles" class="form-label">Detalles</label>
                            <textarea class="form-control" name="detalles" required><?php echo htmlspecialchars($row['detalles']); ?></textarea>
                        </div>

                        <div class="mb-3">
    <label for="id_cilindro" class="form-label">Tipo de Cilindro</label>
    <select class="form-select" name="id_cilindro" required>
        <option value="" disabled selected>Seleccione un tipo de cilindro</option>
        <?php
        // Conexión a la base de datos
        include('../../../config/conexion.php'); 

        // Consulta para obtener los tipos de cilindro
        $query = "SELECT id_cilindro, tipo_cilindro, peso_cilindro FROM tipo_cilindro";
        $result = mysqli_query($conn, $query);

        // Verifica si la consulta fue exitosa
        if ($result) {
            // Verifica si hay resultados y genera las opciones
            if (mysqli_num_rows($result) > 0) {
                while ($cilindro = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . htmlspecialchars($cilindro['id_cilindro']) . '">' . htmlspecialchars($cilindro['tipo_cilindro']) . ' (Peso: ' . htmlspecialchars($cilindro['peso_cilindro']) . ' kg)</option>';
                }
            } else {
                echo '<option value="" disabled>No hay tipos de cilindro disponibles</option>';
            }
        } else {
            // Manejo de errores en caso de que la consulta falle
            echo '<option value="" disabled>Error al obtener tipos de cilindro</option>';
        }

        // Cierra la conexión a la base de datos
        mysqli_close($conn);
        ?>
    </select>
</div>

                        <button type="submit" name="actualizar" class="btn btn-primary">Actualizar</button>
                        <a href="historial_entregas.php" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>
</html>