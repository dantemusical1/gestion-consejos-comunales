<?php
// Conexión a la base de datos
$host = "localhost";
$user_db = "root";
$password = "";
$name_db = "empresa";

// Crear conexión
$conn = new mysqli($host, $user_db, $password, $name_db);

// Verificar conexión
if ($conn->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
    exit(); 
}

session_start(); 

// Inicializar variables
$nombre = isset($_POST["txtusuario"]) ? $_POST["txtusuario"] : '';
$pass = isset($_POST["txtpassword"]) ? $_POST["txtpassword"] : '';
$rol = isset($_POST["rol"]) ? $_POST["rol"] : '';

// Para iniciar sesión
if (isset($_POST["btnloginx"])) {
    $nombre = mysqli_real_escape_string($conn, $nombre); 

    // Sanitizar entrada

    /**
     * Lo que realiza SELECT * FROM login WHERE usu = '$nombre'" es realizar
     * una busqueda en la base de datos para verificar que existe alguien en la
     * columna usu tal que coincida con el usuario que ha sido enviado por metodo de post
     * si esto es cierto procede a comparar la clave por medio del hash MD5
     * 
     */
    $queryusuario = mysqli_query($conn, "SELECT * FROM login WHERE usu = '$nombre'");
    
    // Busca entre todas las filas de la base de datos al usuario
    $nr = mysqli_num_rows($queryusuario);
    $mostrar = mysqli_fetch_array($queryusuario);

    if (($nr == 1) && (password_verify($pass, $mostrar['pass']))) {
        $_SESSION['user_id'] = $mostrar['id']; // Asegúrate de que 'id' es el campo correcto
        $_SESSION['nombredelusuario'] = $nombre;

// Verificar si el rol coincide

if ($mostrar['rol'] === $rol) {

    $_SESSION['user_id'] = $mostrar['id']; // Asegúrate de que 'id' es el campo correcto

    $_SESSION['nombredelusuario'] = $nombre;

    $_SESSION['rol'] = $mostrar['rol']; // Guardar el rol en la sesión


    // Redirigir según el rol

    switch ($_SESSION['rol']) {

        case 'admin':

            header("Location: ../admin/index.php");

            exit();

        case 'user':

            header("Location: ../user/index.php");

            exit();

        case 'tecnico':

            header("Location: ../tecnico/index.php");

            exit();

        default:

            // Si el rol no es reconocido, redirigir a ../../index.php

            echo "<script>alert('Rol no reconocido.'); window.location= '../../index.php';</script>";

            exit();

    }

} else {

    // Si el rol no coincide, redirigir a index.php

    echo "<script>alert('El rol no coincide.'); window.location= '../../index.php';</script>";

    exit();

}

} else {

echo "<script>alert('Usuario o contraseña incorrecto.'); window.location= '../index.html';</script>";

}

}


?>