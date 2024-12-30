<html lang="es">
	<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/escudo.png" type="image/x-icon">
<!--	<link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css"> -->
<!--  	<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">-->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<style> 

body.dark-mode { background-color: #121212; color: #ffffff; } 
.dark-mode .navbar { background-color: #333333; } 
</style>	
</head>

		</body>
<?php
include('menu-retroceder.php');
?>
			<div class="container">
			<div class="row justify-content-center pt-1 mt-5">
					<div class="col-md-5 formulario">
				<div class="card">

						<div class="card-header">
					<h5 class="text-center card-title">Inicio de sesion</h5>
						</div>
					<div class="card-body pt-5">
          	
	<form method="post" action="login.php">
	
			<div class="mb-3">
	  		<div class="form-group">
				<label>Usuario del sistema </label>
					<input class="form-control" type="text" name="txtusuario" placeholder="Cedula" aria-label="default input example">
			</div>
			</div>

		<div class="mb-3">
			<div class="form-group">
   			 <label for="exampleInputPassword1">clave</label>
    			 <input type="password" class="form-control" name="txtpassword" id="exampleInputPassword1" placeholder="Clave">
  			</div>
		</div>
		
		<div class="mb-3">
			<select class="form-select" aria-label="Default select example" name="rol">
				<option selected disabled>selecione una opcion</option>
				<option value="admin">Administrador</option>
				<option value="user">Secretario</option>
			  </select>
		</div>

		<div class="form-group mx-4 pt-4 pb-4">
				<button type="submit" class="btn btn-primary form-control" value="Enviar" name="btnloginx"> Iniciar sesion </button>	
		</div>


	</form>
	</div>
	</div>
	</div>
	</div>
	


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/b9ab8a816a.js" crossorigin="anonymous"></script>
</body>
</html>