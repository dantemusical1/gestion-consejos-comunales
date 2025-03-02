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
</head>
<body>
    <?php
    include("menu.php");
    ?>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pt-5 pb-5">
                    <h1 class="text-center">Lista de familiares y jefes de familia de la comunidad</h1>
                </div>

                <a class="btn btn-primary" href="../formularios/registro_jefe_familia.php" role="button">  
                    <i class="bi bi-person-fill-add"></i> Registrar nuevo jefe familiar
                </a>

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
                $query = "SELECT id, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, nacionalidad, cedula, direccion, nro_casa, email, telefono FROM jefes_familia LIMIT $limit OFFSET $offset";
                $result = $conn->query($query);

                // Mostrar los resultados en una tabla
                echo '<div class="container mt-5">';
                // Campo de búsqueda
                echo '<div class="mb-3 d-flex">';
                echo '<input type="text" id="searchInput" class="form-control me-2" placeholder="Buscar...">';
                echo '<button id="searchButton" title="buscar" class="btn btn-primary"><i class="bi bi-search"></i></button>';
                echo '</div>';

                /**
                 * comienzo de la tabla
                 */
                echo '<table id="jefesTable" class="table table-bordered table-striped table-hover">';
                echo '<thead>';
                echo '<tr class="table-primary">';
                echo '<th>Nombre Completo</th>';
                echo '<th>Nacionalidad</th>';
                echo '<th>Cédula</th>';
                echo '<th>Dirección</th>';
                echo '<th>Número de Casa</th>';
                echo '<th>Email</th>';
                echo '<th>Teléfono</th>';
                echo '<th>Acciones</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($row['primer_nombre']) . ' ' . htmlspecialchars($row['segundo_nombre']) . ' ' . htmlspecialchars($row['primer_apellido']) . ' ' . htmlspecialchars($row['segundo_apellido']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['nacionalidad']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['cedula']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['direccion']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['nro_casa']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['telefono']) . '</td>';
                        echo '<td>';
                        echo '<a class="btn btn-primary" href="mostrar_datos_jefe_de_familia.php?id=' . htmlspecialchars($row['id']) . '" title="Datos familia">' .
                        '<i class="bi bi-journal-text"></i>' .
                        '</a>' .
                        '<a class="btn btn-danger" href="controller/?id=' . htmlspecialchars($row['id']) . '" title="Eliminar" onclick="return confirmDelete();">' .
                        '<i class="bi bi-journal-x"></i>' .
                        '</a>';
                   echo '</td>'; 
                   echo '</tr>'; 
               }
           } else {
               echo '<tr><td colspan="8">No se encontraron registros.</td></tr>'; // Mensaje si no hay registros
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
           echo '</div>'; // Cierra el contenedor principal

           $conn->close(); // Cierra la conexión a la base de datos
           ?>
<script src="buscarJefes.js"></script>
<script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>
</html>