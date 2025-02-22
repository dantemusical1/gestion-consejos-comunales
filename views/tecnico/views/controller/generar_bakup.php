<?php
if (isset($_POST['backupBtn'])) {
    include('../../../../config/conexion.php');
    // Nombre del archivo de respaldo con la fecha en formato día-mes-año
    $backupFilename = "respaldos_del_sistema" . date("d_m_Y_H_i_s") . ".sql";

    // Crear la carpeta si no existe
    if (!is_dir('respaldos_del_sistema')) {
        mkdir('respaldos_del_sistema', 0777, true);
    }

    // Ruta del comando mysqldump para Windows
    $mysqldumpPathWindows = 'C:\xampp\mysql\bin\\mysqldump.exe';

    // Comando para generar el respaldo en Windows
    $commandWindows = "\"$mysqldumpPathWindows\" --user=$username --password=$password --host=$servername $dbname > $backupFilename 2>&1";
    
    // Ruta del comando mysqldump para Linux
    $mysqldumpPathLinux = '/usr/bin/mysqldump';

    // Comando para generar el respaldo en Linux
    $commandLinux = "$mysqldumpPathLinux --user=$username --password=$password --host=$servername $dbname > $backupFilename 2>&1";
    
    // Detectar el sistema operativo
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        exec($commandWindows, $output, $returnCode);
    } else {
        exec($commandLinux, $output, $returnCode);
    }

    if ($returnCode === 0) {
        echo "Respaldo generado correctamente. Archivo: $backupFilename";
    } else {
        echo "Error al generar el respaldo. Detalles: " . implode("\n", $output);
    }

    echo "<script> alert('Registrada nueva Backup');window.location= '../../index.php' </script>";
}
?>
