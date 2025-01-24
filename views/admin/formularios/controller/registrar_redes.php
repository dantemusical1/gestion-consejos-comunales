<?php
   //conexion
   include('../../../../config/conexion.php');


// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn_registra_redes'])) {
    // Obtener los datos del formulario
    $estado = trim($_POST['estado']);
    $municipio = trim($_POST['municipio']);
    $aldea = trim($_POST['aldea']);
    $consejo_comunal = trim($_POST['consejo_comunal']);
    $pag_web = trim($_POST['pag_web']);
    $facebook = trim($_POST['facebook']);
    $whatsapp = trim($_POST['whatsapp']);

    // Validar que los campos no estén vacíos
    if (empty($estado) || empty($municipio) || empty($aldea) || empty($consejo_comunal)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }
 
    // Preparar la consulta SQL
    $stmt = $conn->prepare("INSERT INTO redes (estado, municipio, aldea, consejo_comunal, pag_web, facebook, whatsapp) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $estado, $municipio, $aldea, $consejo_comunal, $pag_web, $facebook, $whatsapp);
    if ($stmt->execute()) {

        echo "Registro exitoso";
    
    } else {
    
        echo "Error al registrar: " . $stmt->error; // Muestra el error
    
    }
    

    // Cerrar la declaración
    $stmt->close();
}

// Cerrar conexión
$conn->close();
?>