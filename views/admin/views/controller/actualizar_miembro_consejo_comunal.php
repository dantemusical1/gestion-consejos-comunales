<?php

include('../../../../config/conexion.php');

// Obtener los datos del formulario
$id_miembro = $_POST['id_miembro'];
$primer_nombre = $_POST['primer_nombre'];
$segundo_nombre = $_POST['segundo_nombre'];
$primer_apellido = $_POST['primer_apellido'];
$segundo_apellido = $_POST['segundo_apellido'];
$cedula = $_POST['cedula'];
$direccion = $_POST['direccion'];
$nro_casa = $_POST['nro_casa'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$cargo = $_POST['cargo'];

// Consulta SQL de actualización
$sql = "UPDATE miembro_consejo_comunal SET primer_nombre = ?, segundo_nombre = ?, primer_apellido = ?, segundo_apellido = ?, cedula = ?, direccion = ?, nro_casa = ?, email = ?, telefono = ?, cargo = ? WHERE id_miembro = ?";

// Preparar la consulta
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Vincular los parámetros
    $stmt->bind_param("ssssssssssi", $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $cedula, $direccion, $nro_casa, $email, $telefono, $cargo, $id_miembro);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Miembro actualizado correctamente.";
        
        header("Location: ../mostrar_miembros_consejo_comunal.php"); 
        exit;
    } else {
        echo "Error al actualizar el miembro: " . $stmt->error;
    }


    $stmt->close();
} else {
    echo "Error en la consulta preparada: " . $conn->error;
}

$conn->close();
?>