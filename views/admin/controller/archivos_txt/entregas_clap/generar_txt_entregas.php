<?php
include('conexion.php');

// Directorio donde se guardará el archivo
$dir = 'archivos_txt/';

// Verificar si el directorio existe, si no, crearlo
if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}

// Nombre del archivo a crear, incluyendo la ruta del directorio
$filename = $dir . 'victor.txt';

// Contenido a escribir en el archivo
$contenido = "\tHistorial de entregas de clap en la comunidad".$nombre_consejo_comunal."\n";

// Intentar crear y escribir en el archivo
if (file_put_contents($filename, $contenido) !== false) {
    // Mensaje de éxito
    echo "<script>alert('El txt HA SIDO generado de manera exitosa.'); window.location= '../index.php';</script>";
} else {
    // Mensaje de error
    error_log("Error al crear el archivo: $filename", 0);
    echo "<script>alert('Error al crear el archivo.'); window.location= '../index.php';</script>";
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>