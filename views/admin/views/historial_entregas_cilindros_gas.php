<?php
include('../Objetos/Clap.php');
include('../Objetos/Persona.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <title>Lista de Entregas de gas Consejo Comunal</title>
</head>
<body>
    <?php
    include('menu.php');
    ?>




<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Lista de Entregas de gas <?php $ConsejoComunal="Campo Elias"; echo $ConsejoComunal; ?></h1> 
<div class="row">
<div class="mt-4 mb-4">
<?php

echo '<a href="#" class="btn btn-success" onclick="confirmarGeneracion(); return false;">Generar TXT de Entregas</a>';

?>



</div>
</div>

<?php

// Simulación de la recuperación de miembros desde la base de datos
// Aquí deberías implementar la lógica para obtener los miembros desde la base de datos
$miembro1 = new MiembroConsejoComunal('1980-01-01', '12345678', 'Masculino', '12-10', 'Juan', 'Pérez', 'Presidente');
$miembro2 = new MiembroConsejoComunal('1990-05-15', '87654321', 'Femenino', '12-23', 'María', 'Gómez', 'Desarrollo Comunitario');

// Crear entregas de CLAP
$entrega1 = new Clap($miembro1, '12-10', '2023-10-01');
$entrega2 = new Clap($miembro2, '12-23', '2023-10-15');

// Almacenar las entregas en un array
$entregas = [$entrega1, $entrega2];
?>

<?php
// Conexión a la base de datos
include('../../../config/conexion.php');

// Inicializar la paginación
$limit = 10; // Número de registros por página
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Obtener el número de página actual
$offset = ($page - 1) * $limit; // Calcular el desplazamiento

// Consulta para obtener el total de registros de cilindros
$totalQuery = "SELECT COUNT(*) as total FROM historial_entregas_cilindros";
$totalResult = $conn->query($totalQuery);
$totalRow = $totalResult->fetch_assoc();
$totalRecords = $totalRow['total'];
$totalPages = ceil($totalRecords / $limit); // Calcular el número total de páginas

// Consulta para obtener los registros de cilindros con paginación
$query = "SELECT id_entrega, fecha_entrega, nro_casa, detalles, 'Gas' as tipo FROM historial_entregas_cilindros LIMIT $limit OFFSET $offset";

$result = $conn->query($query);

// Mostrar los resultados en una tabla
echo '<div class="container mt-5">';
echo '<h2>Historial de Entregas de Cilindros</h2>';
echo '<table class="table table-bordered table-striped table-hover">';
echo '<thead>';
echo '<tr class="table-primary">';
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
        $fechaOriginal = $row['fecha_entrega'];

        // Crear un objeto DateTime a partir de la fecha original
        $fecha = new DateTime($fechaOriginal);
        
        // Formatear la fecha en el formato 'd-m-Y'
        $fechaFormateada = $fecha->format('d-m-Y');
        
        // Mostrar la fecha formateada
        echo '<td>' . htmlspecialchars($fechaFormateada) . '</td>';
        
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
        </div>
    </div>
</div>
<script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
<script src="alert_entregas_gas_txt.js"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>-->
</body>
</html>