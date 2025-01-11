<?php
header('Content-Type: application/json');
include('conexion.php');

$result = $mysqli->query("SELECT id, nombre FROM estados");
$estados = [];

while ($row = $result->fetch_assoc()) {
    $estados[] = $row;
}

echo json_encode($estados);
$mysqli->close();
?>