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


            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nro</th>
                        <th>Responsable de la entrega</th>
                        <th>Beneficiado</th>
                        <th>Cédula</th>
                        <th>Nro de Casa</th>
                        <th>Fecha de Entrega</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($entregas as $index => $entrega): ?>
                        <tr>
                            <td><?php echo $index + 1; ?></td> <!-- Número de entrega -->
                            <td><?php ?></td>
                            <td><?php echo $entrega->getMiembro()->getNombre() . ' ' . $entrega->getMiembro()->getApellido(); ?></td>
            
                            <td><?php echo $entrega->getMiembro()->getCedulaIdentidad(); ?></td>
                            <td><?php echo $entrega->getNumeroCasa(); ?></td>
                            <td><?php echo (new DateTime($entrega->getFechaEntrega()))->format('d/m/Y'); ?></td> <!-- Formato de fecha -->                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
<script src="alert_entregas_gas_txt.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>