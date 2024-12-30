<?php
include('../Objetos/Persona.php');

// Supongamos que tienes un array de miembros
$miembros = [
    new MiembroConsejoComunal('1980-01-01', '12345678', 'Masculino', '10', 'Juan', 'Pérez', 'Presidente'),
    new Asesor('1990-05-15', '87654321', 'Femenino', '20', 'María', 'Gómez', 'Desarrollo Comunitario'),
    // Agrega más miembros según sea necesario
];
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
    ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Lista de Miembros del Consejo Comunal</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Cédula</th>
                        <th>Nro de Casa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($miembros as $miembro): ?>
                        <tr>
                            <td><?php echo $miembro->getNombre(); ?></td>
                            <td><?php echo $miembro->getApellido(); ?></td>
                            <td><?php echo $miembro->getCedulaIdentidad(); ?></td>
                            <td><?php echo $miembro->getNumeroCasa(); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>

</body>
</html>