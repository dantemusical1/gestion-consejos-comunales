<?php

 include('../config/conexion.php');

$usu 	= $_POST["txtusuario"];
$pass 	= $_POST["txtpassword"];
$rol 	= $_POST["rol"];



$queryusuario = mysqli_query($conn,"SELECT * FROM login WHERE usuario ='$usu' and pass = '$pass' and rol = '$rol'");
$nr 		= mysqli_num_rows($queryusuario);  
	
if ($nr == 1 )  
	{ 
		if($rol=="Usuario")
			{	
				header("Location: ../views/usuario/index.php");
			}
		else 
		if ($rol=="Admin")
			{
				header("Location: ../views/administrador/adminviews.php");
			}
	}
else
	{
	echo "<script> alert('Usuario, contraseña o rol incorrecto.');window.location= '../index.html' </script>";
	}


?>