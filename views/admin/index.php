<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <title>Dashboard Administrador</title>
</head>
<body>
    <?php
include('menu.php');
    ?>
    <div class="container">
        <?php

session_start(); // Asegúrate de iniciar la sesión

// Incluir el archivo de conexión a la base de datos
include("../conexion.php"); // Asegúrate de que este archivo contenga la conexión a la base de datos

// Obtener el usuario ingresado
$usuarioingresado = $_SESSION['usuarioingresando'];

// Verificar si el usuario está autenticado
if (!isset($usuarioingresado)) {
    echo "No has iniciado sesión.";
    exit();
}

// Realizar la consulta para obtener los datos del usuario
$sql = "SELECT primer_nombre, segundo_nombre, primer_apellido, segundo_apellido FROM login WHERE usu = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuarioingresado); // "s" indica que el parámetro es una cadena
$stmt->execute();
$result = $stmt->get_result();

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Obtener los datos del usuario
    $row = $result->fetch_assoc();
    
    // Imprimir los campos
    echo "Primer Nombre: " . htmlspecialchars($row['primer_nombre']) . "<br>";
    echo "Segundo Nombre: " . htmlspecialchars($row['segundo_nombre']) . "<br>";
    echo "Primer Apellido: " . htmlspecialchars($row['primer_apellido']) . "<br>";
    echo "Segundo Apellido: " . htmlspecialchars($row['segundo_apellido']) . "<br>";
} else {
    echo "No se encontraron datos para el usuario.";
}

// Cerrar la declaración y la conexión
$stmt->close();
$conn->close();

        ?>
</div>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>
</html>