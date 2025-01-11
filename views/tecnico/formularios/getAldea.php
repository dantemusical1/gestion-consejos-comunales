<?php
header('Content-Type: application/json');

include('conexion.php');

$comunaId = intval($_GET['comunaId']);
$result = $mysqli->query("SELECT id, nombre FROM consejos_comunales WHERE comuna_id = $comunaId");
$aldeas = [];

while ($row = $result->fetch_assoc()) {
    $aldeas[] = $row;
}

echo json_encode($aldeas);
$mysqli->close();
?>