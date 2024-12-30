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
		<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
<button id="theme-toggle" class="btn btn-outline-dark ms-3">Modo Oscuro</button>      
    </a>
  </div>
</nav>
<script> 
const toggleButton = document.getElementById('theme-toggle'); 
toggleButton.addEventListener('click', () => { document.body.classList.toggle('dark-mode'); 
if (document.body.classList.contains('dark-mode')) { toggleButton.textContent = 'Modo Claro'; 
toggleButton.classList.remove('btn-outline-dark'); 
toggleButton.classList.add('btn-outline-light'); } 
else { toggleButton.textContent = 'Modo Oscuro'; 
toggleButton.classList.remove('btn-outline-light'); 
toggleButton.classList.add('btn-outline-dark'); } }); 
</script>
			<div class="container">
			<div class="row justify-content-center pt-1 mt-5">
					<div class="col-md-5 formulario">
				<div class="card">

						<div class="card-header">
					<h5 class="text-center card-title">Agregar carga familiar</h5>
						</div>
					<div class="card-body pt-5">
          	
	<form method="post" action="" autocomplete="off">
	
			<div class="mb-3">
	  		<div class="form-group">
				<label>Nombre <i class="fa-solid fa-user"></i> </label>
					<input class="form-control" type="text" name="" placeholder="" aria-label="default input example" require>
			</div>
			</div>

		<div class="mb-3">
			<div class="form-group">
   			 <label for="">fecha de nacimiento</label>
    			 <input type="password" class="form-control" name="" id="exampleInputPassword1" placeholder="Clave">
  			</div>
		</div>
		
		<div class="mb-3">
			<select class="form-select" aria-label="Default select example" name="nacionalidad">
				<option selected disabled>selecione una opcion</option>
				<option value="V">Venezolano</option>
				<option value="E">Extranjero</option>
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