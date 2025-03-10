<?php
/*


*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css">    
    <link rel="shortcut icon" href="../../../asset/logoclap.jpg" />

    <title>Miembros Consejo Comunal</title>
    <style>
        #searchInput {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <?php include("menu.php"); ?>
    <div class="container">
        <div class="pt-4 pb-4">
                <a class="btn btn-primary" href="form_registro_miembro_consejo_comunal.php" role="button"> <i class="bi bi-person-fill-add"></i> Registrar nuevo miembro</a>
        </div>
    <div class="row">
        <div class="col-md-12">
            <div class="input-group mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Buscar por nombre, apellido o cédula...">
                <button id="searchButton" class="btn btn-primary" type="button">Buscar</button>
            </div>
            
            <?php
// Conexión a la base de datos
include('../../../config/conexion.php');

// Inicializar la paginación
$limit = 10; // Número de registros por página
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Obtener el número de página actual
$offset = ($page - 1) * $limit; // Calcular el desplazamiento

// Consulta para obtener el total de registros de miembros del consejo comunal
$totalQuery = "SELECT COUNT(*) as total FROM miembro_consejo_comunal";
$totalResult = $conn->query($totalQuery);
$totalRow = $totalResult->fetch_assoc();
$totalRecords = $totalRow['total'];
$totalPages = ceil($totalRecords / $limit); // Calcular el número total de páginas

// Consulta para obtener los registros de miembros del consejo comunal con paginación
$query = "SELECT id_miembro, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, cedula, direccion, nro_casa, email, telefono, cargo FROM miembro_consejo_comunal LIMIT $limit OFFSET $offset";

$result = $conn->query($query);

// Mostrar los resultados en una tabla
echo '<div class="container mt-5">';
echo '<h2>Miembros de la comunidad del Consejo Comunal de Mirabel</h2>';

echo '<table id="miembrosTable" class="table table-bordered table-striped table-hover">';
echo '<thead>';
echo '<tr class="table-primary">';
echo '<th>Nombre Completo</th>';
echo '<th>Cédula</th>';
echo '<th>Dirección</th>';
echo '<th>Número de Casa</th>';
echo '<th>Email</th>';
echo '<th>Teléfono</th>';
echo '<th>Cargo</th>';
echo '<th>Acciones</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['primer_nombre']) . ' ' . htmlspecialchars($row['segundo_nombre']) . ' ' . htmlspecialchars($row['primer_apellido']) . ' ' . htmlspecialchars($row['segundo_apellido']) . '</td>';
        echo '<td>' . htmlspecialchars($row['cedula']) . '</td>';
        echo '<td>' . htmlspecialchars($row['direccion']) . '</td>';
        echo '<td>' . htmlspecialchars($row['nro_casa']) . '</td>';
        echo '<td>' . htmlspecialchars($row['email']) . '</td>';
        echo '<td>' . htmlspecialchars($row['telefono']) . '</td>';
        echo '<td>' . htmlspecialchars($row['cargo']) . '</td>'; 
        echo '<td>' .
            '<a class="btn btn-primary" href="form_actualizar_miembro_consejo_comunal.php?id=' . htmlspecialchars($row['id_miembro']) . '" title="Modificar datos">' .
            '<i class="bi bi-journal-text"></i>' .
            '</a>' .
            '<a class="btn btn-danger" href="controller/eliminar_miembro_consejo_comunal.php?id=' . htmlspecialchars($row['id_miembro']) . '" title="Eliminar" onclick="return confirmDelete();">' .
            '<i class="bi bi-journal-x"></i>' .
            '</a>' .
            '</td>';
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
            
                        <script>
                            function confirmDelete() {
                                return confirm("¿Está seguro de eliminar?");
                            }
                        </script>
            
                    </div>
                </div>
            </div>
            
            <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
            <script src="buscarMiembros.js"></script> <!-- Referencia al archivo JavaScript externo -->
            
            </body>
            </html>