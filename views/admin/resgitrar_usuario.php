<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Aqui inicia los modulos globales-->
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
  	<link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
        <!--Aqui aparecen los modulos locales de css o js-->
    <title>resgistro usuario</title>
</head>
<body>
<?php
include('menu_retroceso.php');
?>
    <div class="container">
        <div class="row justify-content-center pt-1 mt-5">
                <div class="col-md-5 formulario">
                    <div class="card">
                        <div class="card-header">
                             <h5 class="text-center card-title">Registro de Usuarios</h5>
                        </div>
                
                        <div class="card-body pt-5">
          
                            <!--Aqui empieza el formulario-->
                            <form action="controller/login.php" method="post">
    <div class="mb-3">
        <div class="form-group">
            <label for="primer_nombre">Primer nombre del Usuario <i class="bi bi-person-circle"></i></label>
            <input class="form-control" type="text" name="primer_nombre" id="primer_nombre" aria-label="Primer nombre" autocomplete="off" required>
        </div>
    </div>

    <div class="mb-3">
        <div class="form-group">
            <label for="segundo_nombre">Segundo nombre del Usuario <i class="bi bi-person-circle"></i></label>
            <input class="form-control" type="text" name="segundo_nombre" id="segundo_nombre" aria-label="Segundo nombre" autocomplete="off">
        </div>
    </div>

    <div class="mb-3">
        <div class="form-group">
            <label for="primer_apellido">Primer Apellido del Usuario <i class="bi bi-person-circle"></i></label>
            <input class="form-control" type="text" name="primer_apellido" id="primer_apellido" aria-label="Primer apellido" autocomplete="off" required>
        </div>
    </div>

    <div class="mb-3">
        <div class="form-group">
            <label for="segundo_apellido">Segundo Apellido del Usuario <i class="bi bi-person-circle"></i></label>
            <input class="form-control" type="text" name="segundo_apellido" id="segundo_apellido" aria-label="Segundo apellido" autocomplete="off">
        </div>
    </div>

    <div class="mb-3">
        <div class="form-group">
            <label for="txtusuario">Usuario del sistema <i class="bi bi-person-circle"></i></label>
            <input class="form-control" type="text" name="txtusuario" id="txtusuario" placeholder="Cédula" aria-label="Cédula" oninput="validateInput()" autocomplete="off" required>
            <div id="feedback" class="invalid-feedback">        
                La cédula debe tener entre 6 y 11 caracteres y solo puede contener números.
            </div>
            <div id="valid-feedback" class="valid-feedback">
                ¡Todo bien!
            </div>
        </div>
    </div>

    <div class="mb-3">
        <div class="form-group">
            <label for="exampleInputPassword1">Clave <i class="bi bi-key-fill"></i></label>
            <input type="password" class="form-control" name="txtpassword" id="exampleInputPassword1" placeholder="Clave" oninput="validatePasswordInput()" autocomplete="off" required>
            <div id="password-feedback" class="invalid-feedback">
                La clave debe tener al menos 5 caracteres.
            </div>
            <div id="password-valid-feedback" class="valid-feedback">
                ¡Todo bien!
            </div>
            <input type="checkbox" id="showPassword" onclick="togglePasswordVisibility()"> Mostrar contraseña
        </div>
    </div>

    <div class="mb-3">
        <select class="form-select" aria-label="Rol" name="rol" required>
            <option selected disabled>Seleccione una opción</option>
            <option value="admin">Administrador</option>
            <option value="user">Usuario</option>
            <option value="tecnico">Técnico</option>
        </select>
    </div>

    <div class="form-group">
        <label for="correo" class="form-label">Correo</label>
        <input type="email" class="form-control" id="correo" name="correo" required>
    </div>

    <div class="form-group mx-4 pt-4 pb-4">
        <button type="submit" class="btn btn-primary form-control" value="Enviar" name="btnregistrarx">Iniciar sesión</button>
    </div>
</form>

<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
<script src="controller/usuario.js"></script>



</body>
</html>
