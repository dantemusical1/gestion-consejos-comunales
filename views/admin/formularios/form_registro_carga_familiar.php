<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <title>Registro de Cargas Familiares</title>
</head>
<body>
<?php
include('menu-retroceder.php');
?>

<div class="container">
    <div class="row justify-content-center pt-1 mt-5">
        <div class="col-md-5 formulario">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center card-title">Registro de carga familiar</h5>
                </div>
                <div class="card-body pt-5">
                    <!-- Aquí empieza el formulario -->
                    <form action="../controller/registrar_carga_familiar.php" method="post">
                        <div class="mb-3">
                            <label for="jefeFamilia" class="form-label">Seleccione Jefe de Familia</label>
                            <select name="jefe_familia_id" id="jefeFamilia" class="form-select" aria-label="Seleccione Jefe de Familia">
                                <option selected disabled>Seleccione un jefe de familia</option>
                                <?php
                                include("../../../config/conexion.php");

                                $sql = "SELECT * FROM jefes_familia";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    $id = $row['id'];
                                    $primer_nombre = $row['primer_nombre'];
                                    $segundo_nombre = $row['segundo_nombre'];
                                    $primer_apellido = $row['primer_apellido'];

                                    // Mostrar el miembro en el menú desplegable
                                    echo '<option value="' . $id . '">' . $primer_nombre . ' ' . $segundo_nombre . ' ' . $primer_apellido . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nombreCargaFamiliar" class="form-label">Nombre de la Carga Familiar</label>

                            <div class="input-group">
                        <input type="text" name="primer_nombre_carga_familia" aria-label="First name" placeholder="Primer Nombre" class="form-control">
                        <input type="text" name="segundo_nombre_carga_familia" aria-label="Last name" placeholder="Segundo Nombre"   class="form-control">
                        </div>
                        </div>

                        <div class="mb-3">
                            <label for="nombreCargaFamiliar" class="form-label">Apellidos de la Carga Familiar</label>

                            <div class="input-group">
                        <input type="text" name="primer_apellido_carga_familia" aria-label="First name" class="form-control" placeholder="Primer Apellido">
                        <input type="text" name="segundo_apellido_carga_familia" aria-label="Last name" class="form-control" placeholder="Segundo Apellido">
                            </div>
                        </div>


                        <input type="submit" value="Registrar Carga Familiar" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>
</html>