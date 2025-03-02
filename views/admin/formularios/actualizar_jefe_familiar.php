<?php
include("../../../config/conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="formularios/css/buscar_jefe_familiar.css">
    <link rel="stylesheet" href="assets/css/actualizar_jefe_de_familia.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="assets/js/buscar_jefe_familiar.js"></script>
    <title>Actualizar Jefe de Familia</title>
</head>
<body>

<?php
include('menu-retroceder.php');
?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <h2>Actualizar Jefe de Familia</h2>
            </div>
        <div class="card-body">

        <!--Aqui empieza el formulario-->
        <form action="actualizar_jefe.php" method="post" autocomplete="off">
                
            
            <div class="form-group">
                <label for="buscar_jefe_familiar">Buscar jefe familiar:</label>
                <div class="search-container">
                    <div class="input-group mb-3">
                    <input type="text" id="buscar_jefe_familiar" name="cedula_jefe_familiar" class="form-control" placeholder="Buscar..." oninput="validarEntrada(event); getCodigos();" aria-describedby="button-addon2">
                    <button type="button" class="btn btn-primary" onclick="realizarBusqueda()" id="button-addon2">Buscar</button>
                </div>
        <div class="invalid-feedback" id="mensaje-advertencia">
            La entrada debe tener entre 8 y 11 caracteres.
        </div>
    </div>
</div>

                <div class="form-group">
                    <label for="miembro_familia">Seleccionar Miembro de la Familia:</label>
                    <select id="miembro_familia" name="miembro_familia" class="form-control" required>
                        <option value="">Seleccione un miembro</option>
                        <?php
                        // Asegúrate de que la consulta a la base de datos esté definida
                        while ($row = $result->fetch_assoc()) {
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
                <div class="form-group">
                        <button type="submit" class="btn btn-success">Actualizar Miembro</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- Enlace a Bootstrap JS y dependencias-->
<script src="../../../node_modules/jquery/dist/jquery.slim.js"></script>
<script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../../node_modules/@popperjs/core/dist/umd/popper.js"></script>
<script src="../../../node_modules/bootstrap/dist/js/bootstrap.js"></script>
<!-- Los enlaces van de los más globales a los más locales -->

</body>
</html>