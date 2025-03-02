<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../../asset/logoclap.jpg" type="image/x-icon">
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
                    <h1 class="text-center">Lista de Entregas de gas <?php $ConsejoComunal="Mirabel"; echo $ConsejoComunal; ?></h1> 
                </div>   
            <div class="row">
      <div class="mt-4 mb-4">
            <a href="../formularios/form_registro_entrega_cilindro.php" class="btn btn-success">Registrar Nueva entrega</a>
            </div>
            </div>
<?php
            include('../../../config/conexion.php');
            $limit = 10;
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; 
            $offset = ($page - 1) * $limit;

            // Consulta para obtener el total de registros de cilindros
            $totalQuery = "SELECT COUNT(*) as total FROM historial_entregas_cilindros";
            $totalResult = $conn->query($totalQuery);
            $totalRow = $totalResult->fetch_assoc();
            $totalRecords = $totalRow['total'];
            $totalPages = ceil($totalRecords / $limit); 
            $query = "
            SELECT 
                he.id_entrega, 
                he.id_miembro, 
                he.id_jefe_familia, 
                he.fecha_entrega, 
                he.nro_casa, 
                he.detalles, 
                'Gas' as tipo,
                CONCAT(mc.primer_nombre, ' ', mc.segundo_nombre, ' ', mc.primer_apellido, ' ', mc.segundo_apellido) AS nombre_completo,
                CONCAT(jf.primer_nombre, ' ', jf.segundo_nombre, ' ', jf.primer_apellido, ' ', jf.segundo_apellido) AS nombre_completo_jefe
            FROM 
                historial_entregas_cilindros he
            LEFT JOIN 
                miembro_consejo_comunal mc ON he.id_miembro = mc.id_miembro
            LEFT JOIN 
                jefes_familia jf ON he.id_jefe_familia = jf.id
            LIMIT $limit OFFSET $offset
        ";
        $result = $conn->query($query);
        
        // Mostrar los resultados en una tabla
        echo '<div class="container mt-5">';
        echo '<h2>Historial de Entregas de Cilindros</h2>';
        echo '<table class="table table-bordered table-striped table-hover">';
        echo '<thead>';
        echo '<tr class="table-primary">';
        echo '<th>Fecha de Entrega</th>';
        echo '<th>Número de Casa</th>';
        echo '<th>Responsable entrega</th>';
        echo '<th>Receptor de recibir</th>';
        echo '<th>Detalles</th>';
        echo '<th>Tipo</th>';
        echo '<th>Acciones</th>'; 
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                $fechaOriginal = $row['fecha_entrega'];
                $fecha = new DateTime($fechaOriginal);        
                // Formatear la fecha en el formato 'd-m-Y'
                $fechaFormateada = $fecha->format('d-m-Y'); 
                echo '<td>' . htmlspecialchars($fechaFormateada) . '</td>';            
                echo '<td>' . htmlspecialchars($row['nro_casa']) . '</td>';  
                echo '<td>' . htmlspecialchars($row['nombre_completo']) . '</td>';
                // Mostrar el nombre completo del jefe de familia
                echo '<td>' . htmlspecialchars($row['nombre_completo_jefe']) . '</td>';
                echo '<td>' . htmlspecialchars($row['detalles']) . '</td>';
                echo '<td>' . htmlspecialchars($row['tipo']) . '</td>';
        
                // Botones
                
                echo '<td>';
                // Botón para modificar
                echo '<form action="controller/modificar_entrega_gas.php" method="post" style="display:inline;">';
                echo '<input type="hidden" name="id_entrega" value="' . htmlspecialchars($row['id_entrega']) . '">';
                echo '<button type="submit" class="btn btn-warning btn-sm"><i class="bi bi-journal"></i></button>';
                echo '</form>';
                
                // Botón para eliminar
                echo '<form action="controller/eliminar_entrega_gas.php" method="post" style="display:inline;">';
                echo '<input type="hidden" name="id_entrega" value="' . htmlspecialchars($row['id_entrega']) . '">';
                echo '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'¿Estás seguro de que deseas eliminar este registro?\');"><i class="bi bi-trash-fill"></i></button>';
                echo '</form>';
                echo '</td>';
                
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="7">No se encontraron registros.</td></tr>'; // Cambiar a 7 para incluir la columna de acciones
        }
        
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
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

echo '</div>'; 

$conn->close();
?>
        </div>
    </div>
</div>
<script src="../../../node_modules/jquery/dist/jquery.js"></script>
<script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
<script src="../../../node_modules/@popperjs/core/dist/umd/popper.js"></script>
<script src="alert_entregas_gas.js"></script>
</body>
</html>