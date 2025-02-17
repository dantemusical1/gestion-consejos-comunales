<?php
include("../../../../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $jefe_familia_id = $_POST['jefe_familia_id'];
    $primer_nombre = $_POST['primer_nombre_carga_familia'];
    $segundo_nombre = $_POST['segundo_nombre_carga_familia'];
    $primer_apellido = $_POST['primer_apellido_carga_familia'];
    $segundo_apellido = $_POST['segundo_apellido_carga_familia'];
    $cedula = $_POST['cedula'];

    // Verificar si la cédula ya existe
    $checkCedulaQuery = "SELECT * FROM miembros_familia WHERE cedula = ?";
    $stmt = mysqli_prepare($conn, $checkCedulaQuery);
    mysqli_stmt_bind_param($stmt, "s", $cedula);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // La cédula ya existe
        echo "<script>alert('La cédula ya está registrada.'); window.history.back();</script>";
    } else {
        // Verificar si el jefe de familia existe
        $checkJefeFamiliaQuery = "SELECT * FROM jefes_familia WHERE id = ?";
        $jefeStmt = mysqli_prepare($conn, $checkJefeFamiliaQuery);
        mysqli_stmt_bind_param($jefeStmt, "i", $jefe_familia_id);
        mysqli_stmt_execute($jefeStmt);
        $jefeResult = mysqli_stmt_get_result($jefeStmt);

        if (mysqli_num_rows($jefeResult) == 0) {
            // El jefe de familia no existe
            echo "<script>alert('El jefe de familia seleccionado no existe.'); window.history.back();</script>";
        } else {
            // Insertar nuevo miembro de familia
            $insertQuery = "INSERT INTO miembros_familia (id_jefe_familia, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, cedula) 
                            VALUES (?, ?, ?, ?, ?, ?)";
            $insertStmt = mysqli_prepare($conn, $insertQuery);
            mysqli_stmt_bind_param($insertStmt, "isssss", $jefe_familia_id, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $cedula);

            if (mysqli_stmt_execute($insertStmt)) {
                echo "<script>alert('Miembro de familia registrado exitosamente.'); window.location.href='../../index.php';</script>";
            } else {
                echo "<script>alert('Error al registrar el miembro de familia: " . mysqli_error($conn) . "'); window.history.back();</script>";
            }
        }

        // Cerrar la declaración del jefe de familia
        mysqli_stmt_close($jefeStmt);
    }

    // Cerrar la declaración de la cédula
    mysqli_stmt_close($stmt);
}

// Cerrar la conexión
mysqli_close($conn);
?>