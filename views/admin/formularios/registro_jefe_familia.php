<?php
include('../../../config/conexion.php'); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Registro Jefe Familiar</title>
    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="shortcut icon" href="../../../asset/logoclap.jpg" />

    <script src="control_formulario.js"></script>
</head>
<body>
<?php include('menu-retroceder.php'); ?>

<div class="container mt-4">
    <h2 class="text-center">Registro de Jefe Familiar</h2>
    <form action="registrar_nuevo_jefe_de_familia.php" method="post" onsubmit="return validarFormulario();">
        <table class="table table-bordered">
            <tr>
                <th colspan="2" class="text-center">Datos Personales</th>
            </tr>
            <tr>
                <td>Nombres</td>
                <td>
                    <div class="input-group">
                        <input type="text" aria-label="Primer nombre" id="primer_nombre" name="primer_nombre" class="form-control" placeholder="Primer Nombre" oninput="validarNombres()" onblur="validarNombres()">
                        <input type="text" aria-label="Segundo nombre" id="segundo_nombre" name="segundo_nombre" class="form-control" placeholder="Segundo Nombre" oninput="validarNombres()" onblur="validarNombres()">
                    </div>
                    <small id="error_message" class="text-danger" style="display: none;"></small>
                </td>
            </tr>
            <tr>
                <td>Apellidos</td>
                <td>
                    <div class="input-group">
                        <input type="text" aria-label="Primer apellido" id="primer_apellido" name="primer_apellido" class="form-control" placeholder="Primer Apellido" oninput="validarApellidos()" onblur="validarApellidos()">
                        <input type="text" aria-label="Segundo apellido" id="segundo_apellido" name="segundo_apellido" class="form-control" placeholder="Segundo Apellido" oninput="validarApellidos()" onblur="validarApellidos()">
                    </div>
                    <small id="error_message_apellidos" class="text-danger" style="display: none;"></small>
                </td>
            </tr>
            <tr>
                <td>Nacionalidad</td>
                <td>
                    <div class="input-group">
                        <select class="form-select" id="nacionalidad" name="nacionalidad" aria-label="Nacionalidad">
                            <option selected disabled>Nacionalidad</option>
                            <option value="V">Venezolano</option>
                            <option value="E">Extranjero</option>
                        </select>
                        <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cédula" aria-label="Cédula" oninput="validarCedula(this)">
                        <small id="cedulaError" class="text-danger" style="display: none;">La cédula debe tener entre 6 y 11 caracteres numéricos.</small>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Sexo</td> 
                <td>
                    <div class="input-group">
                        <select class="form-select" id="genero" name="genero" aria-label="Género">
                            <option selected disabled>Género</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <th colspan="2" class="text-center">Datos de Ubicación y Contacto</th>
            </tr>
            <tr>
                <td>Dirección</td>
                <td><input type="text" class="form-control" placeholder="Dirección" id="direccion" name="direccion"></td>
            </tr>
            <tr>
                <td>Nro de casa</td>
                <td><input type="text" class="form-control" placeholder="Nro de casa" id="nro_casa" name="nro_casa"></td>
            </tr>
            <tr>
                <td>Correo electrónico</td>
                <td>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" oninput="validarEmail()" onblur="validarEmail()">
                    <small id="error_message_email" class="text-danger" style="display: none;"></small>
                </td>
            </tr>
            <tr>
                <td>Teléfono</td>
                <td>
                    <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Teléfono de contacto" oninput="validarTelefono()" onblur="validarTelefono()">
                    <small id="error_message_telefono" class="text-danger" style="display: none;"></small>
                </td>
            </tr>
            <tr>
                <th colspan="2" class="text-center">Otros Datos Importantes</th>
            </tr>
            <tr>
                <td>Fecha de Nacimiento</td>
                <td><input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento"></td>
            </tr>
            <tr>
                <td>Estado de Discapacidad</td>
                <td>
                    <div class="input-group">
                        <select class="form-select" id="estado_de_discapacidad" name="estado_de_discapacidad" aria-label="Estado de Discapacidad">
                            <option selected disabled>Seleccione</option>
                            <option value="SI">Sí</option>
                            <option value="NO">No</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center"><input type="submit" value="Enviar" class="btn btn-primary btn-block"></td>
            </tr>
        </table>
    </form>
</div>

<script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../controller/validar-campos-jefe-familia.js"></script>
<script src="../controller/buscar_existencia_jefe_familiar.js"></script>
</body>
</html>