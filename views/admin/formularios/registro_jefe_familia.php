<?php
include('../../../config/conexion.php')
 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Carrusel en Bootstrap</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"> <!-- Enlace al archivo CSS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!--Aqui inicia los modulos-->
    <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
  	<link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.css">
</head>
<body>
<?php

include('menu-retroceder.php');

?>
<div class="container mt-4">

<div id="carouselExampleIndicators" class="carousel slide" >
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>


    <div class="carousel-inner">
        <div class="carousel-item active" style="background-image: url('img/slide_1.jpg');">

                <div class="row justify-content-center align-items-center" style="height: 100%;">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">



<!--aqui inicia el formulario-->
                                <form action="" method="post">

<!--Aqui comienzan los datos personales-->
                                <h2 class="text-center">Datos personales</h2>
                                
                                <div class="form-group">

                                <div class="form-group">

<label>Nombres</label>

<div class="input-group">

    <input type="text" aria-label="First name" id="primer_nombre" class="form-control" placeholder="Primer Nombre" oninput="validarNombres()" onblur="validarNombres()">

    <input type="text" aria-label="Last name" id="segundo_nombre" class="form-control" placeholder="Segundo Nombre" oninput="validarNombres()" onblur="validarNombres()">

</div>

<small id="error_message" class="text-danger" style="display: none;"></small>

</div>

<div class="form-group">

    <label>Apellidos</label>

    <div class="input-group">

        <input type="text" aria-label="First surname" id="primer_apellido" class="form-control" placeholder="Primer Apellido" oninput="validarApellidos()" onblur="validarApellidos()">

        <input type="text" aria-label="Last surname" id="segundo_apellido" class="form-control" placeholder="Segundo Apellido" oninput="validarApellidos()" onblur="validarApellidos()">

    </div>

    <small id="error_message_apellidos" class="text-danger" style="display: none;"></small>

</div>


                                    <div class="form-group">
                                    <div class="mb-3">

    <label for="nacionalidad" class="form-label">Nacionalidad</label>
    <div class="input-group">
        <select class="form-select" id="nacionalidad" aria-label="Nacionalidad">
            <option selected disabled>nacionalidad</option>
            <option value="V">Venezolano</option>
            <option value="E">Extrangero</option>
        </select>
        <input type="text" class="form-control" id="cedula" placeholder="Cédula" aria-label="Cédula" oninput="validarCedula(this)">
    <small id="cedulaError" class="text-danger" style="display: none;">La cédula debe tener entre 6 y 11 caracteres numéricos.</small> 
</div>
</div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!--Segundo Carrusel-->
        <div class="carousel-item" style="background-image: url('img/slide_2.jpg');">
            <div class="container">
                <div class="row justify-content-center align-items-center" style="height: 100%;">
                    
                <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="text-center">Datos de hubicacion y contacto</h2>
                              
                                  
                                    <div class="form-group">
                                        <label for="">Direccion <i class="bi bi-house-door-fill"></i></label>
                                        <input type="text" class="form-control" placeholder="Dirección">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Nro de casa">
                                    </div>




                                    <div class="form-group">

<label for="">Correo electrónico <i class="bi bi-envelope-at-fill"></i></label>

<input type="email" class="form-control" id="email" placeholder="Email" oninput="validarEmail()" onblur="validarEmail()">

<small id="error_message_email" class="text-danger" style="display: none;"></small>

</div>

<div class="form-group">

    <label for="telefono">Teléfono <i class="bi bi-telephone-forward-fill"></i></label>

    <input type="tel" class="form-control" id="telefono" placeholder="Teléfono de contacto" oninput="validarTelefono()" onblur="validarTelefono()">

    <small id="error_message_telefono" class="text-danger" style="display: none;"></small>

</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!--Tercer slider-->
        <div class="carousel-item" style="background-image: url('img/slide_3.jpg');">
            <div class="container">
                <div class="row justify-content-center align-items-center" style="height: 100%;">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="text-center">Otros datos importantes</h2>
                          
                                <div class="form-group  mt-3 mb-3">
                                    <label for="">fecha_nacimiento</label>
                          <input type="date" class="form-control" name="fecha_nacimiento" id="">
                                </d-iv>

                                <label for="">Posee en su grupo familiar alguien con discapacidad</label>
                                <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
  <label class="form-check-label" for="flexCheckIndeterminate">
   Posee familiares con discapacidad
  </label>
</div>
</div>

                                  
                                    <input type="submit" value="Enviar" class="btn btn-primary btn-block">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
    </a>
</div>
</div>
<!--Aqui comienzan los scripts que controlan que cada input sea llenado de manera correcta-->

<script src="../controller/validar-campos-jefe-familia.js"></script>
<script src="../controller/buscar_existencia_jefe_familiar.js"></script>
</body>
</html>