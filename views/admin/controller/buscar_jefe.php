<?php
// Configuración de la base de datos
include('../../../config/conexion.php');

// Obtener la cédula del jefe de familia desde la solicitud POST
$cedula = $_POST['cedula'];

// Consulta SQL para obtener el id del jefe de familia
$sql = "SELECT id FROM jefes_familia WHERE cedula = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $cedula);
$stmt->execute();
$stmt->bind_result($id_jefe);
$stmt->fetch();
$stmt->close();

// Si se encuentra el jefe de familia, buscar los miembros de la familia
if ($id_jefe) {
    // Consulta SQL para obtener miembros de la familia asociados al jefe de familia
    $sql = "SELECT id, primer_nombre, segundo_nombre, primer_apellido FROM miembros_familia WHERE id_jefe_familia = ? ORDER BY id";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_jefe);
    $stmt->execute();
    $result = $stmt->get_result();

    // Generar las opciones del menú desplegable
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $primer_nombre = $row['primer_nombre'];
        $segundo_nombre = $row['segundo_nombre'];
        $primer_apellido = $row['primer_apellido'];

        // Mostrar el miembro en el menú desplegable
        echo '<option value="' . $id . '">' . $primer_nombre . ' ' . $segundo_nombre . ' ' . $primer_apellido . '</option>';
    }

    // Cerrar la declaración
    $stmt->close();
} else {
    // Si no se encuentra el jefe de familia, mostrar un mensaje
    echo '<option value="">No se encontró el jefe de familia</option>';
}

// Cerrar conexión