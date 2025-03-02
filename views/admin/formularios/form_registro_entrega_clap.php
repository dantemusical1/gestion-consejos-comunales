<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="icon" href="../../../asset/logoclap.jpg" type="image/x-icon">

    <title>Registro de Entrega de CLAP</title>
</head>
<body>
    <?php include('menu-retroceder.php'); ?>

    <div class="container">
        <div class="row justify-content-center pt-1 mt-5">
            <div class="col-md-6 formulario">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center card-title">Registro de Entrega de CLAP</h2>
                    </div>
                    <div class="card-body pt-5">
                        <form method="post" action="controller/registrar_nuevo_clap.php">

                            <div class="mb-3">
                                <label for="id_miembro" class="form-label">Miembro responsable de la entrega</label>
                                <select class="form-select" name="id_miembro" required>
                                    <option value="" disabled selected>Seleccione un miembro</option>
                                    <?php
                                    include('../../../config/conexion.php');
                                    $query = "SELECT id_miembro, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido FROM miembro_consejo_comunal";
                                    $result = mysqli_query($conn, $query);

                                    if ($result && mysqli_num_rows($result) > 0) {
                                        while ($miembro = mysqli_fetch_assoc($result)) {
                                            $nombreCompleto = htmlspecialchars($miembro['primer_nombre'] . ' ' . $miembro['segundo_nombre'] . ' ' . $miembro['primer_apellido'] . ' ' . $miembro['segundo_apellido']);
                                            echo '<option value="' . htmlspecialchars($miembro['id_miembro']) . '">' . $nombreCompleto . '</option>';
                                        }
                                    } else {
                                        echo '<option value="" disabled>No hay miembros disponibles</option>';
                                    }
                                    mysqli_close($conn);
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="id_jefe_familia" class="form-label">Responsable de recibir</label>
                                <select class="form-select" name="id_jefe_familia" required>
                                    <option value="" disabled selected>Seleccione un jefe de familia</option>
                                    <?php
                                    include('../../../config/conexion.php');
                                    $query_family = "SELECT `id`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `nacionalidad`, `cedula`, `genero`, `direccion`, `nro_casa`, `email`, `telefono`, `estado_de_discapacidad`, `id_red` FROM `jefes_familia`";
                                    $result = mysqli_query($conn, $query_family);

                                    if ($result && mysqli_num_rows($result) > 0) {
                                        while ($miembro = mysqli_fetch_assoc($result)) {
                                            $nombreCompleto = htmlspecialchars($miembro['primer_nombre']) . ' ' . htmlspecialchars($miembro['segundo_nombre']) . ' ' . htmlspecialchars($miembro['primer_apellido']) . ' ' . htmlspecialchars($miembro['segundo_apellido']);
                                            echo '<option value="' . htmlspecialchars($miembro['id']) . '">' . $nombreCompleto . '</option>';
                                        }
                                    } else {
                                        echo '<option value="" disabled>No hay miembros disponibles</option>';
                                    }
                                    mysqli_close($conn);
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="fecha_entrega" class="form-label">Fecha de Entrega</label>
                                <input type="date" class="form-control" name="fecha_entrega" required>
                            </div>

                            <div class="mb-3">
                                <label for="detalles" class="form-label">Detalles</label>
                                <select class="form-select" name="detalles" required>
                                    <option value="" disabled selected>Seleccione una opción</option>
                                    <option value="bolsa">Bolsa</option>
                                    <option value="caja">Caja</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Registrar Entrega</button>
                            <a href="historial_entregas.php" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../../node_modules/jquery/dist/jquery.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="../../../node_modules/@popperjs/core/dist/umd/popper.js"></script>
</body>
</html>