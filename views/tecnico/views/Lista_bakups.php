<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../../../asset/logoclap.jpg" />
    <title>Document</title>
</head>
<body>
    <?php
    include('menu_retroceso.php');
    ?>


<form method="post" action="controller/generar_bakup.php">
    <button type="submit" name="backupBtn" class="btn btn-secondary">Generar Respaldo</button>
</form>



</body>
</html>