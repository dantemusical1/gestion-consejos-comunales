<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Informacion familiar</title>
</head>
<body>
    <?php
    include("menu_retroceso.php")
    ?>
<div class="container">
<!-- <table class="table table-sm table-dark">-->


<!--Aqui ira reflejada la informacion del jefe familiar-->
<div class="pt-4 pb-4">
    <h2 class="text-center"> Informacion del jefe de familia</h2>
    
<b>Nombre:</b><?php $nombre="victor"; echo $nombre;?><br>
<b>Apellido:</b><?php $apellido="Alarco";echo $apellido?><br>
<b>Cedula de Identidad:</b><?php $cedula="V-27905225"; print($cedula); ?><br>

</div>

    <div class="">
        <h2 class="text-center">Miembro Familiar</h2>
    </div>
   
   <div class="row">
<table class="table table-dark table-hover">
      <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
</div> 
<!--Aqui estan los miembros de familia que son carga familiar-->
<div class="row">
 <div class="">
    <h2 class="text-center">Carga familiar</h2>
 </div>

<table class="table table-dark table-hover">
      <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>

</div>
</div>
<script src="https://kit.fontawesome.com/b9ab8a816a.js" crossorigin="anonymous"></script>
</body>

</html>