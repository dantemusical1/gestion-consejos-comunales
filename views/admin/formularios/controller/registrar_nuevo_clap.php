<?php
// Incluir el archivo de conexión a la base de datos
include('../../../../config/conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $id_miembro = $_POST['id_miembro'];
    $id_jefe_familia = $_POST['id_jefe_familia'];
    $fecha_entrega = $_POST['fecha_entrega'];
    $detalles = $_POST['detalles'];

    // Verificar si el jefe de familia ya retiró 
    $query_verificar = "SELECT COUNT(*) FROM historial_entregas_clap WHERE id_jefe_familia = ? AND DATE(fecha_entrega) = ?";
    $stmt_verificar = mysqli_prepare($conn, $query_verificar);
    mysqli_stmt_bind_param($stmt_verificar, "is", $id_jefe_familia, $fecha_entrega);
    mysqli_stmt_execute($stmt_verificar);
    mysqli_stmt_bind_result($stmt_verificar, $count);
    mysqli_stmt_fetch($stmt_verificar);
    mysqli_stmt_close($stmt_verificar);

    if ($count > 0) {
        echo "<script>alert('Lo sentimos, pero este usuario ya retiró la bolsa hoy.'); window.location.href = '../../views/historial_entregas_clap.php';</script>";
        exit();
    }

    // Obtener el número de casa del jefe de familia
    $query_casa = "SELECT nro_casa FROM jefes_familia WHERE id = ?";
    $stmt_casa = mysqli_prepare($conn, $query_casa);
    mysqli_stmt_bind_param($stmt_casa, "i", $id_jefe_familia);
    mysqli_stmt_execute($stmt_casa);
    $result_casa = mysqli_stmt_get_result($stmt_casa);

    if ($row_casa = mysqli_fetch_assoc($result_casa)) {
        $nro_casa = $row_casa['nro_casa'];

        // Preparar la consulta SQL para insertar los datos
        $query_insert = "INSERT INTO historial_entregas_clap (id_miembro, id_jefe_familia, fecha_entrega, nro_casa, detalles) VALUES (?, ?, ?, ?, ?)";
        $stmt_insert = mysqli_prepare($conn, $query_insert);

        // Vincula
        mysqli_stmt_bind_param($stmt_insert, "iisss", $id_miembro, $id_jefe_familia, $fecha_entrega, $nro_casa, $detalles);

        // Ejecutar la consulta
        if (mysqli_stmt_execute($stmt_insert)) {
            echo "<script>alert('Registro insertado correctamente.'); window.location.href = '../../views/historial_entregas_clap.php';</script>";
            exit();
        } else {
            echo "Error al insertar el registro: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt_insert);
    } else {
        echo "No se encontró el número de casa para el jefe de familia seleccionado.";
    }

    // Cerrar la sentencia de consulta del número de casa
    mysqli_stmt_close($stmt_casa);
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>