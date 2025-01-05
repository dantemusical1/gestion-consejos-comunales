<?php

// Para registrar
if (isset($_POST["btnregistrarx"])) {
    $nombre = mysqli_real_escape_string($conn, $nombre); // Sanitizar entrada
    $pass = mysqli_real_escape_string($conn, $pass); // Sanitizar contraseña
    $rol = mysqli_real_escape_string($conn, $rol); // Sanitizar rol

    $queryusuario = mysqli_query($conn, "SELECT * FROM login WHERE usu = '$nombre'");
    $nr = mysqli_num_rows($queryusuario);

    if ($nr == 0) {
        $pass_fuerte = password_hash($pass, PASSWORD_BCRYPT); // Hash de la contraseña
        // Aquí se almacena la contraseña en texto plano
        $queryregistrar = "INSERT INTO login(`usu`, `pass`, `pass_plain`, `rol`) VALUES ('$nombre', '$pass_fuerte', '$pass', '$rol')";

        if (mysqli_query($conn, $queryregistrar)) {
            echo "<script>alert('Usuario registrado: $nombre'); window.location= '../index.html';</script>";
        } else {
            echo "Error: " . $queryregistrar . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('No puedes registrar a este usuario porque ya tiene una cédula registrada en la base de datos'); window.location= '../index.html';</script>";
    }
}

// Cerrar la conexión al final
$conn->close();
?>