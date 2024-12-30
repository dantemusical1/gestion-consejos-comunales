<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "";

// Nombre del archivo de respaldo con la fecha en formato día-mes-año
$backupFilename = "respaldos_del_sistema/historial_cc" . date("d_m_Y_H_i_s") . ".sql";

// Crear la carpeta si no existe
if (!is_dir('respaldos_del_sistema')) {
    mkdir('respaldos_del_sistema', 0777, true);
}

// Ruta completa del comando mysqldump
$mysqldumpPath = 'C:\xampp\mysql\bin\\mysqldump.exe';

// Comando para generar el respaldo
$command = "\"$mysqldumpPath\" --user=$username --password=$password --host=$servername $dbname > $backupFilename 2>&1";
exec($command, $output, $returnCode);

if ($returnCode === 0) {
    echo "Respaldo generado correctamente. Archivo: $backupFilename";
} else {
    echo "Error al generar el respaldo. Detalles: " . implode("\n", $output);
}

echo "<script> alert('Registro exitoso');window.location= '../index.php' </script>";
?>
