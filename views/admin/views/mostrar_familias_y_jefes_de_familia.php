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
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre Completo</th>
                            <th>Cédula</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($miembrosFamilia as $miembro): ?>
                            <tr>
                                <td><?php echo $miembro->getNombreCompleto(); ?></td>
                                <td><?php echo $miembro->getCedula(); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <h3>Cargas familiares</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre Completo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($cargasFamiliares as $carga): ?>
                            <tr>
                                <td><?php echo $carga->getNombreCompleto(); ?></td>
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