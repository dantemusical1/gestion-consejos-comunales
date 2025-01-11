<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">   
    <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css">   

    <title>Registrar Consejo Comunal</title>
</head>
<body>
    <?php
include('menu_formularios.php');
    ?>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <h5>Registrar Consejo Comunal</h5>
            </div>
            <div class="card-body">
                <form class="row g-3" id="form" method="POST" action="registerConsejo.php">
                    <div class="col-md-6">
                        <label for="estado" class="form-label">Estado</label>
                        <select id="estado" class="form-select" required>
                            <option value="" disabled selected>Seleccione un estado</option>
                            <!-- Options will be populated dynamically -->
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="municipio" class="form-label">Municipio</label>
                        <select id="municipio" class="form-select" required disabled>
                            <option value="" disabled selected>Seleccione un municipio</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="comuna" class="form-label">Comuna</label>
                        <select id="comuna" class="form-select" required disabled>
                            <option value="" disabled selected>Seleccione una comuna</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="aldea" class="form-label">Aldea</label>
                        <select id="aldea" class="form-select" required disabled>
                            <option value="" disabled selected>Seleccione una aldea</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="nombreConsejo" class="form-label">Nombre del consejo comunal</label>
                        <input type="text" id="nombreConsejo" name="nombreConsejo" class="form-control" placeholder="Consejo Comunal" required disabled>
                    </div>

                    <div class="col-12">
                        <input type="hidden" id="aldeaId" name="aldeaId" required>
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary mb-3" disabled>Confirmar identidad</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                <small>Control consejos comunales</small>
            </div>
        </div>
    </div>

    <script src="../../../node_modules/jquery/dist/jquery.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>
</html>
