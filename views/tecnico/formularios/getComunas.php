<?php
header('Content-Type: application/json');
include('conexion.php');

$municipioId = intval($_GET['municipioId']);
$result = $mysqli->query("SELECT id, nombre FROM comunas WHERE municipio_id = $municipioId");
$comunas = [];

while ($row = $result->fetch_assoc()) {
    $comunas[] = $row;
}

echo json_encode($comunas);
$mysqli->close();
?>