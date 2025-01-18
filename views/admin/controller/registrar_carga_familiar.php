<?php

include("../conexion.php");

// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id_jefe_familia = $_POST['jefe_familia_id'];
    $primer_nombre = $_POST['primer_nombre_carga_familia'];
    $segundo_nombre = $_POST['segundo_nombre_carga_familia'];
    $primer_apellido = $_POST['primer_apellido_carga_familia'];
    $segundo_apellido = $_POST['segundo_apellido_carga_familia'];

    // Preparar la consulta SQL
    $sql = "INSERT INTO cargas_familiares (id_jefe_familia, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido) 
            VALUES (?, ?, ?, ?, ?)";

    // Preparar la declaración
    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Vincular las variables a la declaración preparada como parámetros
        mysqli_stmt_bind_param($stmt, "sssss", $id_jefe_familia, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido);

        // Ejecutar la declaración
        if (mysqli_stmt_execute($stmt)) {
            // Redirigir o mostrar un mensaje de éxito
            echo "Carga familiar registrada exitosamente.";
        } else {
            echo "Error al registrar la carga familiar: " . mysqli_error($conn);
        }

        // Cerrar la declaración
        mysqli_stmt_close($stmt);
    } else {
        echo "Error en la preparación de la consulta: " . mysqli_error($conn);
    }

    // Cerrar la conexión
    mysqli_close($conn);
} else {
    echo "No se han enviado datos.";
}

?>