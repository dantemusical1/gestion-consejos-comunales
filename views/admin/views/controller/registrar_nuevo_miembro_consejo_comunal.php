<?php
// Incluir la conexión a la base de datos
include('../../../../config/conexion.php');

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario y sanitizarlos
    $primer_nombre = $conn->real_escape_string(trim($_POST['primer_nombre']));
    $segundo_nombre = $conn->real_escape_string(trim($_POST['segundo_nombre']));
    $primer_apellido = $conn->real_escape_string(trim($_POST['primer_apellido']));
    $segundo_apellido = $conn->real_escape_string(trim($_POST['segundo_apellido']));
    $cedula = $conn->real_escape_string(trim($_POST['cedula']));
    $direccion = $conn->real_escape_string(trim($_POST['direccion']));
    $nro_casa = $conn->real_escape_string(trim($_POST['nro_casa']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $telefono = $conn->real_escape_string(trim($_POST['telefono']));
    $cargo = $conn->real_escape_string(trim($_POST['cargo'])); // Asegúrate de que este campo esté en el formulario

    // Preparar la consulta SQL
    $sql = "INSERT INTO miembro_consejo_comunal (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, cedula, direccion, nro_casa, email, telefono, cargo) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Preparar la declaración
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    // Vincular los parámetros
    $stmt->bind_param("ssssssssss", $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $cedula, $direccion, $nro_casa, $email, $telefono, $cargo);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Redirigir a la página de éxito o mostrar un mensaje de éxito
        header("Location: ../mostrar_miembros_consejo_comunal.php?mensaje=Miembro registrado con éxito");
        exit();
    } else {
        // Redirigir a la página de error o mostrar un mensaje de error
        header("Location: ../mostrar_miembros_consejo_comunal.php?mensaje=Error al registrar el miembro: " . $stmt->error);
        exit();
    }

    // Cerrar la declaración
    $stmt->close();
} else {
    // Redirigir a la página principal si no se envían datos
    header("Location: ../mostrar_miembros_consejo_comunal.php?mensaje=No se enviaron datos");
    exit();
}

// Cerrar conexión
$conn->close();
?>