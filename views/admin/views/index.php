<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <title>Menu inicial</title>
</head>
<body>

<?php
include('menu.php')
?>


<?php
// Conexión a la base de datos
$host = "localhost";
$user_db = "root";
$password = "";
$name_db = "consejos_comunales";

// Crear conexión
$conn = new mysqli($host, $user_db, $password, $name_db);

// Verificar conexión
if ($conn->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
    exit(); 
}

// Inicializar la paginación
$limit = 10; // Número de registros por página
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Obtener el número de página actual
$offset = ($page - 1) * $limit; // Calcular el desplazamiento

// Consulta para obtener el total de registros
$totalQuery = "SELECT COUNT(*) as total FROM (
    SELECT id_entrega, fecha_entrega, nro_casa, detalles, 'CLAP' as tipo
    FROM historial_entregas_clap
    UNION ALL
    SELECT id_entrega, fecha_entrega, nro_casa, detalles, 'Gas' as tipo
    FROM historial_entregas_cilindros
) as combined";

$totalResult = $conn->query($totalQuery);
$totalRow = $totalResult->fetch_assoc();
$totalRecords = $totalRow['total'];
$totalPages = ceil($totalRecords / $limit); // Calcular el número total de páginas

// Consulta para obtener los registros con paginación
$query = "SELECT id_entrega, fecha_entrega, nro_casa, detalles, tipo FROM (
    SELECT id_entrega, fecha_entrega, nro_casa, detalles, 'CLAP' as tipo
    FROM historial_entregas_clap
    UNION ALL
    SELECT id_entrega, fecha_entrega, nro_casa, detalles, 'Gas' as tipo
    FROM historial_entregas_cilindros
) as combined
LIMIT $limit OFFSET $offset";

$result = $conn->query($query);

// Mostrar los resultados en una tabla
echo '<div class="container mt-5">';
echo '<h2>Historial de Entregas</h2>';
echo '<table class="table table-bordered">';
echo '<thead>';
echo '<tr>';
echo '<th>ID Entrega</th>';
echo '<th>Fecha de Entrega</th>';
echo '<th>Número de Casa</th>';
echo '<th>Detalles</th>';
echo '<th>Tipo</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['id_entrega']) . '</td>';
        echo '<td>' . htmlspecialchars($row['fecha_entrega']) . '</td>';
        echo '<td>' . htmlspecialchars($row['nro_casa']) . '</td>';
        echo '<td>' . htmlspecialchars($row['detalles']) . '</td>';
        echo '<td>' . htmlspecialchars($row['tipo']) . '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="5">No se encontraron registros.</td></tr>';
}

echo '</tbody>';
echo '</table>';

// Paginación
echo '<nav aria-label="Page navigation">';
echo '<ul class="pagination justify-content-center">';
if ($page > 1) {
    echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '">Anterior</a></li>';
}
for ($i = 1; $i <= $totalPages; $i++) {
    echo '<li class="page-item' . ($i == $page ? ' active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
}
if ($page < $totalPages) {
    echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '">Siguiente</a></li>';
}
echo '</ul>';
echo '</nav>';

echo '</div>'; // Cerrar contenedor

// Cerrar la conexión
$conn->close();
?>





<script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  
</body>
</html>

