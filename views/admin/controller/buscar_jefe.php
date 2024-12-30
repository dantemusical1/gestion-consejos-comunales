<?php
// Configuración de la base de datos
$host = "localhost"; // Cambia si es necesario
$username = "root"; // Cambia si es necesario
$password = ""; // Cambia si es necesario
$database = "nombre_de_tu_base_de_datos"; // Cambia por el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($host, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

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