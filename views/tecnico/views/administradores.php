<?php
include('../../../config/conexion.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../../../asset/logoclap.jpg" />

    <title>Lista de administradores</title>
</head>
<body>

<?php
include('menu_retroceso.php');
?>
<div class="container">


<div class="row">
<div class="ContenedorTabla" >
	<form method="POST">
	<div style="text-align:left">
	<a href="usuarios_tabla.php" class="BotonesUsuarios">Lista de administradores</a>
	
	<input class="BotonesUsuarios" type="submit" value="Buscar" name="btnbuscar">
	<input class="CajaTexto" type="text" name="txtbuscar"  placeholder="Ingresar correo" autocomplete="off" style='width:20%'>
	</div>
			</form>


            <h1 class="text-center">Lista de usuarios</h1>




	<h1>Lista de usuarios</h1>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  registrar nuevo usuario
</button>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-dark text-white">

        <form action="controller/agregar_nuevo_admin_y_tec.php" method="post">
          <div class="mt-3 mb-3">
            <label for="nombre">Nombre:</label>
            <div class="input-group">
              <input type="text" aria-label="First name" class="form-control" placeholder="primer nombre" name="nombre1" required>
              <input type="text" aria-label="Last name" class="form-control" placeholder="segundo nombre" name="nombre2">
            </div>
          </div>
          <div class="">
            <label for="nombre">apellidos:</label>
            <div class="input-group">
              <input type="text" aria-label="First name" class="form-control" placeholder="primer apellido">
              <input type="text" aria-label="Last name" class="form-control" placeholder="segundo apellido">
            </div>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">correo electronico</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="correo electronico">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">clave</label>
            <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="clave">
          </div>
          <div class="mb-3">
            <label for="nombre">usuario(cedula):</label>
            <input type="text" class="form-control" name="usuario" id="">
          </div>
          <select class="form-select" aria-label="Default select example">
            <option selected disabled>seleccione el rol</option>
            <option value="admin">administrador</option>
            <option value="tecnico">tecnico</option>
          </select>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Understood</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

            <!--Aqui comienza la tabla-->
    <table  class="table" >
		<thead>	
            <tr  class="table-dark">
			<th scope="col">Nombre</th>
			<th scope="col">Correo</th>
            <th scope="col">Password</th>
			<th scope="col">Acción</th>
			</tr>
            </thead>
            <?php
// Consultar el número de administradores en la tabla login
$resultadoMaximo = mysqli_query($conn, "SELECT count(*) as num_usuarios FROM login WHERE rol='admin'");
$maxusutabla = mysqli_fetch_assoc($resultadoMaximo)['num_usuarios'];

// Consultar datos de los usuarios con rol de administrador en la tabla login
$sqlusu = mysqli_query($conn, "SELECT id, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, correo, usu, pass, pass_plain, rol FROM login WHERE rol='admin'");

while ($mostrar = mysqli_fetch_assoc($sqlusu)) {
    echo "<tr>";
    echo "<td>".$mostrar['primer_nombre']."</td>";
    echo "<td>".$mostrar['correo']."</td>";
    echo "<td>*****</td>";
    // echo "<td>".$mostrar['pass']."</td>";
    echo "<td style='width:24%'>
    <a class='BotonesUsuarios' href=\"usuarios_ver.php?correo=$mostrar[correo]&pag=$pagina\">Ver</a> 
    <a class='BotonesUsuarios' href=\"usuarios_modificar.php?correo=$mostrar[correo]&pag=$pagina\">Modificar</a> 
    <a class='BotonesUsuarios' href=\"usuarios_eliminar.php?correo=$mostrar[correo]&pag=$pagina\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[primer_nombre]?')\">Eliminar</a>
    </td>";  
    echo "</tr>";
}
?>


    </table>
	<div style='text-align:right'>
	<br>
	<?php echo "Total de Administradores de consejo comunal: ".$maxusutabla;?>
	</div>
    </div>
	</div>
    </div>    
<!--Aqui comienzan los modulos y scrips-->
<script src="../../../node_modulles/jquery/dist/jquery.js"></script>
<script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>
</html>