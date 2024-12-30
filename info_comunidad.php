<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Aqui inicia los modulos-->
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
  	<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <title>Seleccion de consejo comunal</title>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center pt-1 mt-5">
                <div class="col-md-5 formulario">
            <div class="card">

                    <div class="card-header">
                <h5 class="text-center card-title">Indique la comunidad</h5>
                    </div>
                <div class="card-body pt-5">
          
                    <!--Aqui empieza el formulario-->
                    <form action="controller/comunidad.php" method="post">
                    <div class="mb-3">

                        <div class="form-group">
        
                    <div class="mb-3">

                       
    
    <label for=""></label>
    <div class="mb-3">
        <select class="form-select" aria-label="Default select example" name="rol">
            <option selected disabled>selecione una aldea</option>
            <option value="Casco central">Casco central</option>
            <option value="user">holinda</option>
          </select>
    </div>

    <div class="form-group mx-4 pt-4 pb-4">
            <button type="submit" class="btn btn-primary form-control" value="Enviar" name="btnbuscar"> Buscar informacion </button>	
    </div>

<p><a href="controller/recuperar.php" aria-disabled="true" disabled>Perdio su clave</a> </p>
</form>
</div>
</div>
</div>



</div>
    

    <!--Aqui van los archivos de javascrip que controlan el formulario-->
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
<script src="controller/usuario.js"></script>
</body>
</html>
