<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
   <link rel="stylesheet" href="controller/css/usuarios.css">
    <title>Usuarios del sistema</title>
</head>
<body>
    <?php
    include("menu.php");
    ?>
    <div class="container">
        <table class="table table-striped">
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Password</th>
                <th>Acción</th>
            </tr>
            <tbody>
            <?php
            // Realiza la consulta a la base de datos
            $sqlusu = mysqli_query($conn, "SELECT * FROM login ORDER BY primer_nombre ASC");

            // Itera sobre los resultados de la consulta
            while ($row = mysqli_fetch_array($sqlusu)) {
                echo "<tr>";
                // Muestra el primer nombre
                echo "<td>" . $row['primer_nombre'] . " " . $row['segundo_nombre'] . " " . $row['primer_apellido'] . " " . $row['segundo_apellido'] . "</td>";
                // Muestra el correo
             echo "<td>" . $row['correo'] . "</td>";
                // Muestra un campo de contraseña enmascarado
/*                          echo "<td>*****</td>";*/

// Muestra un campo de contraseña enmascarado
      echo "<td>

      <input type='password' id='pass_" . $row['pass_plain'] . "' value='" . $row['pass_plain'] . "' readonly>

      <button type='button' onclick=\"togglePasswordVisibility('pass_" .$row['pass_plain'] . "', 'icon_" . $row['pass_plain']. "')\">

          <i id='icon_" . $row['usu'] . "' class='bi bi-eye'></i>

      </button>

    </td>";
                // Genera los enlaces de acción
                echo "<td style='width:24%'>";
 echo '
   <!-- Botón para abrir el modal -->

<button id="openModal">Actualizar Usuario</button>


<!-- Modal -->

<section class="modal hidden" id="updateModal">

    <div class="modal-content">

        <span class="btn-close">&times;</span>

        <h3>Actualizar Usuario</h3>

        <form action="updateuser.php" method="post" id="updateForm">
        





            <label for="primer_nombre">Primer Nombre:</label>

            <input type="text" id="primer_nombre" name="primer_nombre" required>


            <label for="segundo_nombre">Segundo Nombre:</label>

            <input type="text" id="segundo_nombre" name="segundo_nombre">


            <label for="primer_apellido">Primer Apellido:</label>

            <input type="text" id="primer_apellido" name="primer_apellido" required>


            <label for="segundo_apellido">Segundo Apellido:</label>

            <input type="text" id="segundo_apellido" name="segundo_apellido">


            <label for="correo">Correo:</label>

            <input type="email" id="correo" name="correo" required>


            <label for="usu">Usuario:</label>

            <input type="text" id="usu" name="usu" required>


            <label for="pass">Contraseña:</label>

            <input type="password" id="pass" name="pass" required>


            <label for="pass_plain">Contraseña Visible:</label>

            <input type="password" id="pass_plain" name="pass_plain" required>


            <label for="rol">Rol:</label>

<select id="rol" name="rol" class="form-select" aria-label="Default select example" required>
    <option value="" disabled selected>Selecciona un rol</option>
    <option value="admin">Administrador</option>
    <option value="editor">Editor</option>
    <option value="usuario">Usuario</option>
    <option value="invitado">Invitado</option>
</select>

            <button type="submit">Actualizar</button>

        </form>

    </div>

</section>

<div class="overlay hidden"></div>

';                        

echo "<a href='controller/delete.php?id={$row['id']}' class='btn btn-danger' onclick=\"return confirm('¿Estás seguro de que deseas eliminar este usuario?');\"><i class='bi bi-trash3-fill'></i></a>";
echo                "</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
    <script src="../../../node_modules/jquery/dist/jquery.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="controller/js/ver_password.js"></script>
    <script src="controller/js/modal_modificar_usuario.js"></script>
</body>
</html>