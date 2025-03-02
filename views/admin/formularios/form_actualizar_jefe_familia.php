<?php
include('../../../config/conexion.php'); 

// Obtener el ID del jefe de familia desde la URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Consulta para obtener los datos del jefe de familia
$query = "SELECT * FROM jefes_familia WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Actualización Jefe Familiar</title>
    <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="shortcut icon" href="../../../asset/logoclap.jpg" />
    <link rel="stylesheet" href="style.css"> 

    <script src="control_formulario.js"></script>
</head>
<body>
    
    <?php 
        include('menu-retroceder.php'); 
    ?>

<div class="container mt-4">
    <h2 class="text-center">Actualizar Jefe Familiar</h2>
    <form action="actualizar_jefe_familia.php" method="post" onsubmit="return validarFormulario();">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
        <table class="table table-bordered">
            <tr>
                <th colspan="2" class="text-center">Datos Personales</th>
            </tr>
            <tr>
                <td>Nombres</td>
                <td>
                    <div class="input-group">
                        <input type="text" aria-label="Primer nombre" id="primer_nombre" name="primer_nombre" class="form-control" placeholder="Primer Nombre" value="<?php echo htmlspecialchars($row['primer_nombre']); ?>" oninput="validarNombres()" onblur="validarNombres()">
                        <input type="text" aria-label="Segundo nombre" id="segundo_nombre" name="segundo_nombre" class="form-control" placeholder="Segundo Nombre" value="<?php echo htmlspecialchars($row['segundo_nombre']); ?>" oninput="validarNombres()" onblur="validarNombres()">
                    </div>
                    <small id="error_message" class="text-danger" style="display: none;"></small>
                </td>
            </tr>
            <tr>
                <td>Apellidos</td>
                <td>
                    <div class="input-group">
                        <input type="text" aria-label="Primer apellido" id="primer_apellido" name="primer_apellido" class="form-control" placeholder="Primer Apellido" value="<?php echo htmlspecialchars($row['primer_apellido']); ?>" oninput="validarApellidos()" onblur="validarApellidos()">
                        <input type="text" aria-label="Segundo apellido" id="segundo_apellido" name="segundo_apellido" class="form-control" placeholder="Segundo Apellido" value="<?php echo htmlspecialchars($row['segundo_apellido']); ?>" oninput="validarApellidos()" onblur="validarApellidos()">
                    </div>
                    <small id="error_message_apellidos" class="text-danger" style="display: none;"></small>
                </td>
            </tr>
            <tr>
                <td>Nacionalidad</td>
                <td>
                    <div class="input-group">
                        <select class="form-select" id="nacionalidad" name="nacionalidad" aria-label="Nacionalidad">
                            <option value="V" <?php echo ($row['nacionalidad'] == 'V') ? 'selected' : ''; ?>>Venezolano</option>
                            <option value="E" <?php echo ($row['nacionalidad'] == 'E') ? 'selected' : ''; ?>>Extranjero</option>
                        </select>
                        <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cédula" aria-label="Cédula" value="<?php echo htmlspecialchars($row['cedula']); ?>" oninput="validarCedula(this)">
                        <small id="cedulaError" class="text-danger" style="display: none;">La cédula debe tener entre 6 y 11 caracteres numéricos.</small>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Sexo</td> 
                <td>
                    <div class="input-group">
                        <select class="form-select" id="genero" name="genero" aria-label="Género">
                            <option value="M" <?php echo ($row['genero'] == 'M') ? 'selected' : ''; ?>>Masculino</option>
                            <option value="F" <?php echo ($row['genero'] == 'F') ? 'selected' : ''; ?>>Femenino</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <th colspan="2" class="text-center">Datos de Ubicación y Contacto</th>
            </tr>
            <tr>
                <td>Dirección</td>
                <td><input type="text" class="form-control" placeholder="Dirección" id="direccion" name="direccion" value="<?php echo htmlspecialchars($row['direccion']); ?>"></td>
            </tr>
            <tr>
                <td>Nro de casa</td>
                <td><input type="text" class="form-control" placeholder="Nro de casa" id="nro_casa" name="nro_casa" value="<?php echo htmlspecialchars($row['nro_casa']); ?>"></td>
            </tr>
            <tr>
                <td>Correo electrónico</td>
                <td>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($row['email']); ?>" oninput="validarEmail()" onblur="validarEmail()">
                    <small id="error_message_email" class="text-danger" style="display: none;"></small>
                </td>
            </tr>
            <tr>
                <td>Teléfono</td>
                <td>
                    <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Teléfono de contacto" value="<?php echo htmlspecialchars($row['telefono']); ?>" oninput="validarTelefono()" onblur="validarTelefono()">
                    <small id="error_message_telefono" class="text-danger" style="display: none;"></small>
                </td>
            </tr>
            <tr>
                <th colspan="2" class="text-center">Otros Datos Importantes</th>
            </tr>
            <tr>
                <td>Fecha de Nacimiento</td>
                <td><input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo htmlspecialchars($row['fecha_nacimiento']); ?>"></td>
            </tr>
            <tr>
                <td>Estado de Discapacidad</td>
                <td>
                    <div class="input-group">
                        <select class="form-select" id="estado_de_discapacidad" name="estado_de_discapacidad" aria-label="Estado de Discapacidad">
                            <option value="SI" <?php echo ($row['estado_de_discapacidad'] == 'SI') ? 'selected' : ''; ?>>Sí</option>
                            <option value="NO" <?php echo ($row['estado_de_discapacidad'] == 'NO') ? 'selected' : ''; ?>>No</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center"><input type="submit" value="Actualizar" class="btn btn-primary btn-block"></td>
            </tr>
        </table>
    </form>
</div>

<script src="../../../node_modules/jquery/dist/jquery.slim.js"></script>
<script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../../node_modules/@popperjs/core/dist/umd/popper.js"></script>
<script src="../../../node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="../controller/validar-campos-jefe-familia.js"></script>
</body>
</html>