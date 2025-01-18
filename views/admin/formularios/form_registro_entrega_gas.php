<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Aquí inicia los módulos globales -->
    <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.css">
    <title>Actualización de Contraseña</title>
</head>
<body>
<?php
include('menu_retroceso.php');
?>
    <div class="container">
        <div class="row justify-content-center pt-1 mt-5">
            <div class="col-md-5 formulario">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center card-title">Registro de entregas de gas</h5>
                    </div>
                    <div class="card-body pt-5">
                        <!-- Aquí empieza el formulario -->
                        <form action="../controller/actualizar_contrasena.php" method="post">
                            
                        <?php

              //  INSERT INTO `historial_entregas_cilindros` (`id_entrega`, `id_miembro`, `id_jefe_familia`, `fecha_entrega`, `nro_casa`, `detalles`, `id_cilindro`) VALUES (NULL, '1', '5', '2025-01-12', '12', 'Entrega de practica 1', '2');
                        ?>
                        <div class="mb-3">
                        <label for="">responsable de la entrega</label>

                    
                                       
                                        <?php

//include('../controller/conexion.php');


// Conexión a la base de datos 
/*
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "consejos_comunales"; 
// Crear una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


*/

include('../../../config/conexion.php');
// Verificar conexión


if ($conn->connect_error) {

    die("Conexión fallida: " . $conn->connect_error);

}


// Consulta para obtener los miembros del consejo comunal

$sql = "SELECT id_miembro, primer_nombre, segundo_nombre FROM miembro_consejo_comunal";

$result = $conn->query($sql);


// Generar el elemento <select>

if ($result->num_rows > 0) {

    echo '<select class="form-select" aria-label="Default select example">';

    while ($row = $result->fetch_assoc()) {

        echo '<option value="' . $row['id_miembro'] . '">' . $row['primer_nombre'] .' '.$row['segundo_nombre'] .'</option>';

    }

    echo '</select>';

            } else {

    echo 'No hay miembros disponibles.';

}


// Cerrar conexión

$conn->close();
                                        ?>
                               
                                    
              

                            </div>

                            <div class="mb-3">
                               <?php

// Conexión a la base de datos
include('../../../config/conexion.php');

// Consulta para obtener los jefes de familia
$sql = "SELECT id, primer_nombre,`segundo_nombre`,`primer_apellido`,`segundo_apellido` FROM jefes_familia";
$result = $conn->query($sql);

// Generar el elemento <select>
if ($result->num_rows > 0) {
    echo '<select class="form-select" aria-label="Default select example">';
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['id_jefe_familia'] . '">' . $row['primer_nombre'] ." ".$row['segundo_nombre']." ".$row['primer_apellido']." ".$row['segundo_apellido']. '</option>';
    }
    echo '</select>';
} else {
    echo 'No hay jefes de familia disponibles.';
}

// Cerrar conexión
$conn->close();


                               ?>
                            </div>


             
                                    <label for="Entrega_gas">Fecha de entrega</label>
                                    <input type="date" id="nacimiento"  name="nacimiento"  class="form-control">
                                


<?php

//nro_casa`, `detalles`, `id_cilindro`
?>
<label for="nro_casa">Nro de casa</label>

<input type="text" name="nro_casa"class="form-group" id="">



<label for="detalles">Detalles de entrega</label>

<input type="text" name="detalles" class="form-group" id="">

<?php

// Conexión a la base de datos
$host = 'localhost'; // Cambia esto si tu base de datos está en otro servidor
$usuario = 'root'; // Cambia esto por tu usuario de base de datos
$contraseña = ''; // Cambia esto por tu contraseña de base de datos
$base_datos = 'consejos_comunales'; // Cambia esto por el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($host, $usuario, $contraseña, $base_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener los jefes de familia
$sql = "SELECT `id_cilindro`,`tipo_cilindro`,`peso_cilindro` FROM `tipo_cilindro`";
$result = $conn->query($sql);

// Generar el elemento <select>
if ($result->num_rows > 0) {
    echo '<select class="form-select" aria-label="Default select example">';
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['id_cilindro'] . '">' . $row['tipo_cilindro'] ." ".$row['peso_cilindro']."kg  ".'</option>';
    }
    echo '</select>';
} else {
    echo 'No hay jefes de familia disponibles.';
}

// Cerrar conexión
$conn->close();


                               ?>


                            <div class="form-group mx-4 pt-4 pb-4">
                                <button type="submit" class="btn btn-primary form-control" name="btnActualizar">Actualizar Contraseña</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Aquí van los archivos de JavaScript que controlan el formulario -->
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="../controller/usuario.js"></script>
</body>
</html>