<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../../asset/logoclap.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css"> 
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.css">
</head>
<body>
<?php
include('menu-retroceder.php');
?>

<div class="container">
    <div class="row justify-content-center pt-1 mt-5">
        <div class="col-md-5 formulario">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center card-title">registrar Redes</h5>
                </div>
                <div class="card-body pt-5">
                    <form method="post" action="controller/registrar_redes.php" autocomplete="off">

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="estado">Estado <i class="bi bi-geo-alt"></i></label>
                                <input class="form-control" type="text" name="estado" id="estado" placeholder="Estado" aria-label="default input example" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="municipio">Municipio <i class="bi bi-geo-alt"></i></label>
                                <input class="form-control" type="text" name="municipio" id="municipio" placeholder="Municipio" aria-label="default input example" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="aldea">Aldea <i class="bi bi-house"></i></label>
                                <input class="form-control" type="text" name="aldea" id="aldea" placeholder="Aldea" aria-label="default input example" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="consejo_comunal">Consejo Comunal <i class="bi bi-people"></i></label>
                                <input class="form-control" type="text" name="consejo_comunal" id="consejo_comunal" placeholder="Consejo Comunal" aria-label="default input example">
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="pag_web">Página web <i class="bi bi-browser-edge"></i></label>
                                <input class="form-control" type="text" name="pag_web" id="pag_web" placeholder="www.pag_consejocomunal.com" aria-label="default input example">
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="facebook">Facebook <i class="bi bi-facebook"></i></label>
                                <input class="form-control" type="text" name="facebook" id="facebook" placeholder="www.facebook.com/tu_pagina" aria-label="default input example">
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="whatsapp">Grupo de WhatsApp <i class="bi bi-whatsapp"></i></label>
                                <input class="form-control" type="text" name="whatsapp" id="whatsapp" placeholder="Número o enlace de WhatsApp" aria-label="default input example" required>
                            </div>
                        </div>

                        <div class="form-group mx-4 pt-4 pb-4">
                            <button type="submit" class="btn btn-primary form-control" name="btn_registra_redes">Actualizar Redes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>
</html>