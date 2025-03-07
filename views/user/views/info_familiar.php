<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
<link rel="shortcut icon" href="../../../asset/logoclap.jpg" type="image/x-icon">

    <title>Informacion familiar</title>
</head>
<body>
    <?php
    include("../menu_retroceso.php");
    ?>
<div class="container">


<!--Aqui ira reflejada la informacion del jefe familiar-->
<div class="pt-4 pb-4">
  <div class="">
    <h2 class="text-center"> Informacion del jefe de familia</h2>      
        <b>Nombre:</b><?php $nombre="victor"; echo $nombre;?><br>
        <b>Direccion:</b><?php $apellido="Alarco";echo $apellido?><br>
        <b>Cedula de Identidad:</b><?php $cedula="V-27905225"; print($cedula); ?><br>
        <b>Telefono:</b><?php $telefono="314-123-4567";?>
        <div class="pt-2">
      <a href="pdf/constancia_residencia.php" class="btn btn-primary"><i class="bi bi-file-earmark-pdf-fill"></i> Constancia de residencia</a>
        </div>
    </div>
</div>

    <div class="pt-2">
        <h2 class="text-center">Miembros de su Familia</h2>
    </div>
   
   <div class="row">
<table class="table table-dark table-hover">
      <thead>
    <tr>
      <th scope="col">Nombre Completo</th>
      <th scope="col">cedula</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    include('../../../config/conexion.php');
    $sql=mysqli_query($conn,"SELECT * FROM miembros_familia");
    while ($mostrar = mysqli_fetch_assoc($sql)) 
		{
			
            echo "<tr>";
            echo "<td>".$mostrar['primer_nombre']." ".$mostrar['segundo_nombre']." ".$mostrar['primer_apellido']." ".$mostrar['segundo_apellido']."</td>";
            echo "<td>".$mostrar['cedula']."</td>";
            echo "</tr>";
    }
   ?>
   
  </tbody>
</table>
</div> 
<!--Aqui estan los miembros de familia que son carga familiar-->
<div class="row">
 

</div>
</div>
<script src="https://kit.fontawesome.com/b9ab8a816a.js" crossorigin="anonymous"></script>
<script src="../../../node_modules/jquery/dist/jquery.js"></script>
<script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
<script src="../../../node_modules/@popperjs/core/dist/umd/popper.js"></script>
</body>

</html>