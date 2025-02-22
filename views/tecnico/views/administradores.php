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



<div class="ContenedorTabla" >
	<form method="POST">
	<h1>Lista de usuarios</h1>
	<div style="text-align:left">
	<a href="usuarios_tabla.php" class="BotonesUsuarios">Inicio de la tabla</a>
	
	<input class="BotonesUsuarios" type="submit" value="Buscar" name="btnbuscar">
	<input class="CajaTexto" type="text" name="txtbuscar"  placeholder="Ingresar correo" autocomplete="off" style='width:20%'>
	</div>
			</form>

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
<!--Aqui comienzan los modulos y scrips-->
<script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>

</body>
</html>