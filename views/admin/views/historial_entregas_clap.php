<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="icon" href="../../../asset/logoclap.jpg" type="image/x-icon">

    <title>Lista de Entregas del Clap Consejo Comunal</title>
    <script>
        function confirmarGeneracion() {
            // Mostrar el mensaje de confirmación
            var confirmar = confirm("Esta a punto de registrar una nueva entrega de la bolsa alimentaria");


            if (confirmar) {
                // Redirigir a la página si el usuario acepta
                window.location.href = "../formularios/form_registro_entrega_clap.php";
            }
        }
    </script>
</head>
<body>
    <?php
    include('menu.php');
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Lista de Entregas del Consejo Comunal <?php $ConsejoComunal = "Mirabel"; echo $ConsejoComunal; ?></h1>
                
                <div class="row">
                    <div class="mt-4 mb-4">
                        <?php
                        echo '<a href="../formularios/form_registro_entrega_clap.php" class="btn btn-success" onclick="confirmarGeneracion(); return false;">Generar  Entregas</a>';
                        ?>
                    </div>
    </div>
    <?php
// Conexión a la base de datos
include('../../../config/conexion.php');
// Inicializar la paginación
$limit = 10; // Número de registros por página
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Obtener el número de página actual
$offset = ($page - 1) * $limit; // Calcular el desplazamiento

// Consulta para obtener el total de registros de CLAP
$totalQuery = "SELECT COUNT(*) as total FROM historial_entregas_clap";
$totalResult = $conn->query($totalQuery);
$totalRow = $totalResult->fetch_assoc();
$totalRecords = $totalRow['total'];
$totalPages = ceil($totalRecords / $limit); // Calcular el número total de páginas

// Consulta para obtener los registros de CLAP con JOIN
$query = "SELECT 
            hec.id_entrega, 
            hec.fecha_entrega, 
            hec.nro_casa, 
            hec.detalles, 
            'CLAP' as tipo,
            jf.primer_nombre as jefe_nombre,
            jf.primer_apellido as jefe_apellido,
            mc.primer_nombre as miembro_nombre,
            mc.primer_apellido as miembro_apellido
          FROM 
            historial_entregas_clap hec
          JOIN 
            jefes_familia jf ON hec.id_jefe_familia = jf.id
          JOIN
            miembro_consejo_comunal mc ON hec.id_miembro = mc.id_miembro
          LIMIT $limit OFFSET $offset";

$result = $conn->query($query);

// Mostrar los resultados en una tabla
echo '<div class="container mt-5">';
echo '<h2>Historial de Entregas CLAP</h2>';
echo '<table class="table table-bordered table-striped table-hover">';
echo '<thead>';
echo '<tr class="table-primary">';
echo '<th>Fecha de Entrega</th>';
echo '<th>Número de Casa</th>';
echo '<th>Responsable de la entrega</th>';
echo '<th>Jefe de familia receptor</th>';
echo '<th>Detalles</th>';
echo '<th>Tipo</th>';
echo '<th>Accion<th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        $fechaOriginal = $row['fecha_entrega'];
        $fecha = new DateTime($fechaOriginal);
        $fechaFormateada = $fecha->format('d-m-Y');
        echo '<td>' . htmlspecialchars($fechaFormateada) . '</td>';
        echo '<td>' . htmlspecialchars($row['nro_casa']) . '</td>';
        echo '<td>' . htmlspecialchars($row['miembro_nombre'] . ' ' . $row['miembro_apellido']) . '</td>';
        echo '<td>' . htmlspecialchars($row['jefe_nombre'] . ' ' . $row['jefe_apellido']) . '</td>';
        echo '<td>' . htmlspecialchars($row['detalles']) . '</td>';
        echo '<td>' . htmlspecialchars($row['tipo']) . '</td>';
        echo '<td><a href="" class="btn btn-primary">Actualizar</a></td>' ;
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="6">No se encontraron registros.</td></tr>';
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
</body>
</html>