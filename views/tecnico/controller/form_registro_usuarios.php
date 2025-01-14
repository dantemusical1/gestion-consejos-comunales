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
$pass_confirm = isset($_POST["txtpassword_confirm"]) ? $_POST["txtpassword_confirm"] : '';
$rol = isset($_POST["rol"]) ? $_POST["rol"] : '';

// Registro de usuario
if (isset($_POST["btnregistro"])) {
    $nombre = mysqli_real_escape_string($conn, $nombre);
    $rol = mysqli_real_escape_string($conn, $rol);

    // Verificar si las contraseñas coinciden
    if ($pass !== $pass_confirm) {
        echo "<script>alert('Las contraseñas no coinciden.'); window.location= 'registro.php';</script>";
    } else {
        $pass = password_hash($pass, PASSWORD_DEFAULT); // Hash de la contraseña

        // Verificar si el usuario ya existe
        $queryusuario = mysqli_query($conn, "SELECT * FROM login WHERE usu = '$nombre'");
        if (mysqli_num_rows($queryusuario) > 0) {
            echo "<script>alert('El usuario ya existe.'); window.location= 'registro.php';</script>";
        } else {
            // Insertar nuevo usuario
            $insertar = "INSERT INTO login (usu, pass, rol) VALUES ('$nombre', '$pass', '$rol')";
            if (mysqli_query($conn, $insertar)) {
                echo "<script>alert('Usuario registrado exitosamente.'); window.location= 'registro.php';</script>";
            } else {
                echo "Error: " . $insertar . "<br>" . mysqli_error($conn);
            }
        }
    }
}

$conn->close();
?>