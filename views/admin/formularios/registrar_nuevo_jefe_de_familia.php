<?php
include('../../../config/conexion.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $primer_nombre = $_POST['primer_nombre'];
    $segundo_nombre = $_POST['segundo_nombre'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $nacionalidad = $_POST['nacionalidad'];
    $cedula = $_POST['cedula'];
    $genero = $_POST['genero'];
    $direccion = $_POST['direccion'];
    $nro_casa = $_POST['nro_casa'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $estado_de_discapacidad = $_POST['estado_de_discapacidad'];
    
    // Establecer el id_red fijo
    $id_red = 2; // Cambia este valor según sea necesario

    // Verificar si la cédula ya está registrada
    $check_sql = "SELECT primer_nombre, segundo_nombre FROM jefes_familia WHERE cedula = ?";
    if ($check_stmt = $conn->prepare($check_sql)) {
        $check_stmt->bind_param("s", $cedula);
        $check_stmt->execute();
        $check_stmt->store_result();

        // Si se encuentra un registro con la misma cédula
        if ($check_stmt->num_rows > 0) {
            // Obtener el nombre del usuario registrado
            $check_stmt->bind_result($nombre1, $nombre2);
            $check_stmt->fetch();
            echo "<script>alert('El usuario ya está registrado bajo el nombre: $nombre1 $nombre2'); window.location.href='registro_jefe_familia.php';</script>";
            $check_stmt->close();
            exit; // Terminar la ejecución del script
        }
        $check_stmt->close();
    }

    // Preparar la consulta SQL para insertar
    $sql = "INSERT INTO jefes_familia (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, nacionalidad, cedula, genero, direccion, nro_casa, email, telefono, estado_de_discapacidad, id_red) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Preparar la declaración
    if ($stmt = $conn->prepare($sql)) {
        // Vincular variables a la declaración
        $stmt->bind_param("sssssssssssss", $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $nacionalidad, $cedula, $genero, $direccion, $nro_casa, $email, $telefono, $estado_de_discapacidad, $id_red);

        // Ejecutar la declaración
        if ($stmt->execute()) {
            // Mostrar alerta de éxito
            echo "<script>alert('Jefe de familia registrado de forma satisfactoria.'); window.location.href='../views/mostrar_familias_y_jefes_de_familia.php';</script>";
        } else {
            echo "Error al crear el registro: " . $stmt->error;
        }

        // Cerrar la declaración
        $stmt->close();
            } else {
                echo "Error en la preparación de la consulta: " . $conn->error;
            }

            // Cerrar la conexión
            $conn->close();
        } else {
            echo "Método de solicitud no válido.";
        }
?>