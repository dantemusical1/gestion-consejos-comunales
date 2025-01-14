<?php
$servername = "localhost";
$username = ""; 
$password = ""; 
$dbname = "consejos_comunales";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['estado_id'])) {
    $estado_id = $_GET['estado_id'];
    $sql = "SELECT id, nombre FROM municipios WHERE estado_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $estado_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $municipios = array();
    while ($row = $result->fetch_assoc()) {
        $municipios[] = $row;
    }
    echo json_encode($municipios);
}

$conn->close();
?>