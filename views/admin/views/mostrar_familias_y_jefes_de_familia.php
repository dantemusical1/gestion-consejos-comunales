<?php
include('../Objetos/Familia.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <title>Miembros Consejo Comunal</title>
</head>
<body>
    <?php
    include("menu.php");

    // Simulación de datos
    $jefeFamilia = new JefeFamilia(1, 'Juan', 'Carlos', 'Pérez', 'González', '12345678', '12-10');
    
    $miembrosFamilia = [
        new MiembroFamilia(1, 1, 'Ana', 'María', 'Pérez', 'González', '87654321'),
        new MiembroFamilia(2, 1, 'Luis', 'Fernando', 'Pérez', 'González', '11223344')
    ];

    $cargasFamiliares = [
        new CargaFamiliar(1, 1, 'Sofía', 'Isabel', 'Pérez', 'González'),
        new CargaFamiliar(2, 1, 'Carlos', 'Andrés', 'Pérez', 'González')
    ];
    ?>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Lista de familias de la comunidad</h1>
                <h2><strong><?php echo $jefeFamilia->getNombreCompleto(); ?></strong></h2> <!-- Nombre del jefe de familia -->

                <h3>Miembros de la familia</h3>
                <?php
// Conexión a la base de datos
include('../../../config/conexion.php');

// Inicializar la paginación
$limit = 10; // Número de registros por página
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Obtener el número de página actual
$offset = ($page - 1) * $limit; // Calcular el desplazamiento

// Consulta para obtener el total de registros de jefes de familia
$totalQuery = "SELECT COUNT(*) as total FROM jefes_familia";
$totalResult = $conn->query($totalQuery);
$totalRow = $totalResult->fetch_assoc();
$totalRecords = $totalRow['total'];
$totalPages = ceil($totalRecords / $limit); // Calcular el número total de páginas

// Consulta para obtener los registros de jefes de familia con paginación
$query = "SELECT primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, nacionalidad, cedula, direccion, nro_casa, email, telefono FROM jefes_familia LIMIT $limit OFFSET $offset";

$result = $conn->query($query);

// Mostrar los resultados en una tabla
echo '<div class="container mt-5">';
echo '<h2>Jefes de Familia</h2>';

// Campo de búsqueda
echo '<div class="mb-3">';
echo '<input type="text" id="searchInput" class="form-control" placeholder="Buscar...">';
echo '<button id="searchButton" class="btn btn-primary mt-2">Buscar</button>';
echo '</div>';

echo '<table id="jefesTable" class="table table-bordered table-striped table-hover">';
echo '<thead>';
echo '<tr class="table-primary">';
echo '<th>Primer Nombre</th>';
echo '<th>Segundo Nombre</th>';
echo '<th>Primer Apellido</th>';
echo '<th>Segundo Apellido</th>';
echo '<th>Nacionalidad</th>';
echo '<th>Cédula</th>';
echo '<th>Dirección</th>';
echo '<th>Número de Casa</th>';
echo '<th>Email</th>';
echo '<th>Teléfono</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['primer_nombre']) . '</td>';
        echo '<td>' . htmlspecialchars($row['segundo_nombre']) . '</td>';
        echo '<td>' . htmlspecialchars($row['primer_apellido']) . '</td>';
        echo '<td>' . htmlspecialchars($row['segundo_apellido']) . '</td>';
        echo '<td>' . htmlspecialchars($row['nacionalidad']) . '</td>';
        echo '<td>' . htmlspecialchars($row['cedula']) . '</td>';
        echo '<td>' . htmlspecialchars($row['direccion']) . '</td>';
        echo '<td>' . htmlspecialchars($row['nro_casa']) . '</td>';
        echo '<td>' . htmlspecialchars($row['email']) . '</td>';
        echo '<td>' . htmlspecialchars($row['telefono']) . '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="10">No se encontraron registros.</td></tr>';
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

<!-- Incluir el script de búsqueda -->
<script src="buscarJefes.js"></script>

    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>
</html>