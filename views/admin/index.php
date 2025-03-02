<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="../../asset/logoclap.jpg" />

    <title>Dashboard Administrador</title>
</head>
<body>

<?php
session_start(); 

// Incluir el archivo de conexión a la base de datos
include("../../config/conexion.php");

// Asegúrate de que este archivo contenga la conexión a la base de datos

// Obtener el usuario ingresado
$usuarioingresado = $_SESSION['nombredelusuario']; 


// Verificar si el usuario está autenticado
if (!isset($usuarioingresado)) {
    echo "<div class='container'><div class='alert alert-danger'>No has iniciado sesión.</div></div>";
    exit();
}

// Realizar la consulta para obtener los datos del usuario
$sql = "SELECT primer_nombre, segundo_nombre, primer_apellido, segundo_apellido FROM login WHERE usu = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    echo "<div class='container'><div class='alert alert-danger'>Error en la preparación de la consulta.</div></div>";
    exit();
}

$stmt->bind_param("s", $usuarioingresado); // "s" indica que el parámetro es una cadena
$stmt->execute();
$result = $stmt->get_result();

?>





<!-- Aquí empieza el menú de opciones -->
<?php 
include("menu.php");


// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Obtener los datos del usuario
    $row = $result->fetch_assoc();
    
    // Imprimir los campos
    echo "<div class='container'>";
    echo "<h2>Datos del Usuario</h2>";
    echo "<p> Bien venido : " . htmlspecialchars($row['primer_nombre'])  ." ". htmlspecialchars($row['segundo_nombre']) . " " . htmlspecialchars($row['primer_apellido']) ." " . htmlspecialchars($row['segundo_apellido'])  ;
    echo "</div>";
} else {
    echo "<div class='container'><div class='alert alert-warning'>No se encontraron datos para el usuario.</div></div>";
}

// Cerrar la declaración y la conexión
$stmt->close();
$conn->close();


?>
<!-- Aquí termina el menú y comienzan los otros ítems a mostrar -->

<script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../node_modules/jquery/dist/jquery.min.js"></script>
</body>
</html>