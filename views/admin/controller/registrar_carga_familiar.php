<?php
$nombre_carga_familiar=$_POST['nombre_carga_familiar'];
/*
echo "<h1>hola</h1>";

echo "<p>".$nombre_jefe_familia."</P>";
*/
/*
id_jefe_familia 	
primer_nombre 	
segundo_nombre 	
primer_apellido 	
segundo_apellido 	

*/

echo '<script>alert("Su carga familiar ha sido creada correctamente") </script> ';
header("Location:../index.php");
?>