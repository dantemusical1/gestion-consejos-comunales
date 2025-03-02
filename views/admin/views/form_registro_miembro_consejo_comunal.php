<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="estilo_tabla_miembros_cc.css">
    <link rel="shortcut icon" href="../../../asset/logoclap.jpg" />
    <title>Registro de Miembros del Consejo Comunal</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Registro de Miembros del Consejo Comunal</h2>
        <form action="controller/registrar_nuevo_miembro_consejo_comunal.php" method="POST">
            <table class="table table-dark table-hover">
                <tbody>
                    <tr>
                        <td><label for="primer_nombre">Primer Nombre</label></td>
                        <td><input type="text" class="form-control" id="primer_nombre" name="primer_nombre" required></td>
                        <td><label for="segundo_nombre">Segundo Nombre</label></td>
                        <td><input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre"></td>
                    </tr>
                    <tr>
                        <td><label for="primer_apellido">Primer Apellido</label></td>
                        <td><input type="text" class="form-control" id="primer_apellido" name="primer_apellido" required></td>
                        <td><label for="segundo_apellido">Segundo Apellido</label></td>
                        <td><input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido"></td>
                    </tr>
                    <tr>
                        <td><label for="cedula">Cédula</label></td>
                        <td><input type="text" class="form-control" id="cedula" name="cedula" required></td>
                        <td><label for="nro_casa">Número de Casa</label></td>
                        <td><input type="text" class="form-control" id="nro_casa" name="nro_casa"></td>
                    </tr>
                    <tr>
                        <td><label for="direccion">Dirección</label></td>
                        <td colspan="4"><input type="text" class="form-control" id="direccion" name="direccion"></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email</label></td>
                        <td><input type="email" class="form-control" id="email" name="email"></td>
                        <td><label for="telefono">Teléfono</label></td>
                        <td><input type="text" class="form-control" id="telefono" name="telefono"></td>
                    </tr>
                    <tr>
                        <td><label for="cargo">Cargo</label></td>
                        <td>
                            <select class="form-control" id="cargo" name="cargo" required>
                                <option value="Vocal">Vocero</option>
                                <option value="Coordinador">Coordinador</option>
                                <option value="Secretario">Secretario</option>
                                <option value="Tesorero">Tesorero</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Registrar Miembro</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="../../../node_modules/@popperjs/core/dist/umd/popper.js"></script>
</body>
</html>