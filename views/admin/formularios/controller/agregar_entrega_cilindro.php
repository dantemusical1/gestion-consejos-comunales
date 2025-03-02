<?php
include ('../../../../config/conexion.php');

      $id_miembro = $_POST['id_miembro'];
      $id_jefe_familia = $_POST['id_jefe_familia'];
      $fecha_entrega = $_POST['fecha_entrega'];
      $nro_casa = $_POST['nro_casa'];
      $id_cilindro = $_POST['id_cilindro'];
      $detalles = $_POST['detalles'];
      $precio = $_POST['precio'];

// Insertar nuevo miembro de familia
$insertQuery = "INSERT INTO `historial_entregas_cilindros` (`id_miembro`, `id_jefe_familia`, `fecha_entrega`, `nro_casa`, `detalles`, `precio`, `id_cilindro`) VALUES (?, ?, ?, ?, ?, ?, ?)";
$insertStmt = mysqli_prepare($conn, $insertQuery);

if ($insertStmt) {
    mysqli_stmt_bind_param($insertStmt, "isssssd", $id_miembro, $id_jefe_familia, $fecha_entrega, $nro_casa, $detalles, $precio, $id_cilindro);

    if (mysqli_stmt_execute($insertStmt)) {
        echo "<script>alert('Entrega de gas registrada exitosamente.'); window.location.href='../../views/historial_entregas_cilindros_gas.php';</script>";
    } else {
        echo "<script>alert('Error al registrar el miembro de familia: " . mysqli_error($conn) . "'); window.location.href='../../views/historial_entregas_cilindros_gas.php';</script>";
    }

    mysqli_stmt_close($insertStmt);
} else {
    echo "<script>alert('Error al preparar la consulta: " . mysqli_error($conn) . "'); window.location.href='../../views/historial_entregas_cilindros_gas.php';</script>";
}

mysqli_close($conn);
?>