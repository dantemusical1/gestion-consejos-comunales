<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Aquí inicia los módulos globales -->
    <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.css">
    <title>Actualización de Contraseña</title>
</head>
<body>
<?php
include('menu_retroceso.php');
?>
    <div class="container">
        <div class="row justify-content-center pt-1 mt-5">
            <div class="col-md-5 formulario">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center card-title">Actualización de Contraseña</h5>
                    </div>
                    <div class="card-body pt-5">

                        <!-- Aquí empieza el formulario -->
                        <form action="../controller/actualizar_contrasena.php" method="post">
                        
                        <div class="mb-3">
                                <label for="nueva_contrasena">Nueva Contraseña <i class="bi bi-key-fill"></i></label>
                                <input type="password" class="form-control" name="nueva_contrasena" id="nueva_contrasena" placeholder="Nueva Contraseña" required autocomplete="off">
                                <div class="invalid-feedback">
                                    La contraseña debe tener al menos 5 caracteres.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="confirmar_contrasena">Confirmar Nueva Contraseña <i class="bi bi-key-fill"></i></label>
                                <input type="password" class="form-control" name="confirmar_contrasena" id="confirmar_contrasena" placeholder="Confirmar Nueva Contraseña" required autocomplete="off">
                                <div class="invalid-feedback">
                                    Las contraseñas no coinciden.
                                </div>
                            </div>

                            <div class="form-group mx-4 pt-4 pb-4">
                                <button type="submit" class="btn btn-primary form-control" name="btnActualizar">Actualizar Contraseña</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Aquí van los archivos de JavaScript que controlan el formulario -->
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="../controller/usuario.js"></script>
</body>
</html>