<?php
                    /*
                    se incluye la conexion a la db, 
                    mas adelante todas las conexiones
                    apuntaran a la carpeta config y 
                    archivo conexion.php, ya que este es
                    el responsable de la conexion a la db 
                    para que la pagina tenga un diseño
                    escalable
                    */

include('conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreConsejo = $_POST['nombreConsejo'];
    $aldeaId = $_POST['aldeaId'];  
    // Aqui se valida al input
    if (!empty($nombreConsejo) && !empty($aldeaId)) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO consejos_comunales (nombre, comuna_id) VALUES (?, ?)");
        $stmt->bind_param("si", $nombreConsejo, $aldeaId);

        if ($stmt->execute()) {
            echo "Registro exitoso!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Todos los campos son obligatorios.";
    }
}
$conn->close();
?>
