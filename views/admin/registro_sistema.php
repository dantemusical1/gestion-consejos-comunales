<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Asegúrate de incluir tu CSS -->
</head>
<body>
    <form id="frmregistrar" class="grupo-entradas" method="POST" action="">
        <label for="txtusuario">&#128273; Ingresar usuario</label>
        <input type="text" class="cajaentradatexto" required name="txtusuario" id="txtusuario">
        
        <label for="txtpassword">&#128274; Ingresar contraseña</label>
        <input type="password" class="cajaentradatexto" required name="txtpassword" id="txtpassword">
        
        <input type="checkbox" class="checkboxvai" name="terms" required>
        <span>He leído y acepto los términos y condiciones de uso.</span>
        
        <button type="submit" class="botonenviar" name="btnregistrarx">Registrar</button>
    </form>

    <script src="path/to/your/scripts.js"></script> <!-- Asegúrate de incluir tu JS si es necesario -->
</body>
</html>

<?php
include('conexion.php');

// Para registrar
if (isset($_POST["btnregistrarx"])) {
    // Obtener y escapar las entradas del usuario
    $nombre = mysqli_real_escape_string($conn, $_POST['txtusuario']);
    $pass = mysqli_real_escape_string($conn, $_POST['txtpassword']);

    // Verificar si el usuario ya existe
    $queryusuario = mysqli_query($conn, "SELECT * FROM login WHERE usu = '$nombre'");
    $nr = mysqli_num_rows($queryusuario); 

    if ($nr == 0) {
        // Hash de la contraseña
        $pass_fuerte = password_hash($pass, PASSWORD_BCRYPT);
        $queryregistrar = "INSERT INTO login(usu, pass) VALUES ('$nombre', '$pass_fuerte')";
        
        if (mysqli_query($conn, $queryregistrar)) {
            echo "<script>alert('Usuario registrado: $nombre'); window.location= 'index.html';</script>";
        } else {
            echo "Error: " . $queryregistrar . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('No puedes registrar a este usuario: $nombre'); window.location= 'index.html';</script>";
    }
}
?>