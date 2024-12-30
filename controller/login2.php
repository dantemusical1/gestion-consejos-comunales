<?php

include('conexion/conexion.php');

$nombre = $_POST["txtusuario"];
$pass   = $_POST["txtpassword"];
$rol    = $_POST["rol"];

// Para iniciar sesión
if (isset($_POST["btnloginx"])) {

    $queryusuario = mysqli_query($conn, "SELECT * FROM login WHERE usu = '$nombre' and rol = '$rol'");
    $nr = mysqli_num_rows($queryusuario); 
    $mostrar = mysqli_fetch_array($queryusuario); 
    
    if ($nr == 1 && password_verify($pass, $mostrar['pass'])) { 
        session_start();
        $_SESSION['nombredelusuario'] = $nombre;
        
        if ($rol == "user") {    
            header("Location: trabajadores/trabajadores_activos/views/pag_user.php");
        } else if ($rol == "admin") {
            header("Location: trabajadores/trabajadores_activos/organos_alcaldia.php");
        }
    } else {
        echo "<script> alert('Usuario, contraseña o rol incorrecto.');window.location= 'index.html' </script>";
    }
}

// Para registrar
if (isset($_POST["btnregistrarx"])) {

    $queryusuario = mysqli_query($conn, "SELECT * FROM login WHERE usu = '$nombre'");
    $nr = mysqli_num_rows($queryusuario); 

    if ($nr == 0) {

        $pass_fuerte = password_hash($pass, PASSWORD_BCRYPT);
        $queryregistrar = "INSERT INTO login(usu, pass) VALUES ('$nombre', '$pass_fuerte')";
        
        if (mysqli_query($conn, $queryregistrar)) {
            echo "<script> alert('Usuario registrado: $nombre');window.location= 'index.html' </script>";
        } else {
            echo "Error: " . $queryregistrar . "<br>" . mysqli_error($conn);
        }

    } else {
        echo "<script> alert('No puedes registrar a este usuario: $nombre');window.location= 'index.html' </script>";
    }
} 

?>
