<?php
header('Content-Type: application/json');
include('conexion.php');
$estadoId = intval($_GET['estadoId']);
$result = $mysqli->query("SELECT id, nombre FROM municipios WHERE estado_id = $estadoId");
$municipios = [];

while ($row = $result->fetch_assoc()) {
    $municipios[] = $row;
}

echo json_encode($municipios);
$mysqli->close();
?>