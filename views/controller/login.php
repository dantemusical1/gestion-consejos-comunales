<?php

// Conexión a la base de datos

include('../../config/conexion.php');


session_start(); 


// Para iniciar sesión

if (isset($_POST["btnloginx"])) {

    $nombre = isset($_POST["txtusuario"]) ? $_POST["txtusuario"] : '';

    $pass = isset($_POST["txtpassword"]) ? $_POST["txtpassword"] : '';

    

    // Sanitizar entrada

    $nombre = mysqli_real_escape_string($conn, $nombre); 


    // Verificar si el usuario existe

    $stmt = $conn->prepare("SELECT * FROM login WHERE usu = ?");

    $stmt->bind_param("s", $nombre);

    $stmt->execute();

    $result = $stmt->get_result();

    $mostrar = $result->fetch_assoc();


    if ($mostrar && password_verify($pass, $mostrar['pass'])) {

        $_SESSION['user_id'] = $mostrar['id'];

        $_SESSION['nombredelusuario'] = $nombre;

        $_SESSION['rol'] = $mostrar['rol'];


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

                echo "<script>alert('Rol no reconocido.'); window.location= '../../index.php';</script>";

                exit();

        }

    } else {

        echo "<script>alert('Usuario o contraseña incorrecto.'); window.location= '../../index.php';</script>";

        exit();

    }

}



// Cuando se registra un usuario

if (isset($_POST["btnregistrarx"])) {

    // Inicializar variables

    $nombre = isset($_POST["txtusuario"]) ? $_POST["txtusuario"] : '';

    $pass = isset($_POST["txtpassword"]) ? $_POST["txtpassword"] : '';

    $rol = isset($_POST["rol"]) ? $_POST["rol"] : '';

    $correo = isset($_POST["correo"]) ? $_POST["correo"] : '';

    $primer_nombre = isset($_POST['primer_nombre']) ? $_POST['primer_nombre'] : '';

    $segundo_nombre = isset($_POST['segundo_nombre']) ? $_POST['segundo_nombre'] : '';

    $primer_apellido = isset($_POST['primer_apellido']) ? $_POST['primer_apellido'] : '';

    $segundo_apellido = isset($_POST['segundo_apellido']) ? $_POST['segundo_apellido'] : '';


    // Verificar si el usuario ya existe

    $stmt = $conn->prepare("SELECT * FROM login WHERE usu = ?");

    $stmt->bind_param("s", $nombre);

    $stmt->execute();

    $result = $stmt->get_result();

    $nr = $result->num_rows;


    if ($nr == 0) {

        // Hash de la contraseña

        $pass_fuerte = password_hash($pass, PASSWORD_BCRYPT);


        // Preparar la consulta de inserción

        $queryregistrar = "INSERT INTO `login` (`primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `correo`, `usu`, `pass`, `pass_plain`, `rol`) 

                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        

        $stmt = $conn->prepare($queryregistrar);

        $stmt->bind_param("sssssssss", $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $correo, $nombre, $pass_fuerte, $pass, $rol);


        // Ejecutar la consulta

        if ($stmt->execute()) {

            echo "<script>alert('Usuario registrado: $nombre'); window.location= '../../index.php';</script>";

        } else {

            echo "<script>alert('Error al registrar el usuario: " . $stmt->error . "'); window.location= '../../index.php';</script>";

        }

    } else {

        echo "<script>alert('No puedes registrar a este usuario: $nombre'); window.location= '../../index.php';</script>";

    }

}