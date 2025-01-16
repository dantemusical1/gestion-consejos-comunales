<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <title>Registro de Cargas familiares</title>
</head>
<body>

<div class="container">
        <div class="row justify-content-center pt-1 mt-5">
            <div class="col-md-5 formulario">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center card-title">Actualización de Contraseña</h5>
                    </div>
                    <div class="card-body pt-5">
                        <!-- Aquí empieza el formulario -->
                        <form action="../controller/registrar_carga_familiar.php" method="post">
                        
                        <div class="mb-3">
                        <select class="form-select" aria-label="Default select example">
  <option selected>Open this select menu</option>
  <?php
  include("../conexion.php");

  $sql = "SELECT * FROM jefes_familia";
  $result = mysqli_query($conn, $sql);
 while($row = mysqli_fetch_array($result)){

    $id = $row['id'];
    $primer_nombre = $row['primer_nombre'];
    $segundo_nombre = $row['segundo_nombre'];
    $primer_apellido = $row['primer_apellido'];

    // Mostrar el miembro en el menú desplegable
    echo '<option value="' . $id . '">' . $primer_nombre . ' ' . $segundo_nombre . ' ' . $primer_apellido . '</option>';
}
?>
</select>
                        </div>
                        <label for="">Nombre de la carga Familiar </label>
                        <div class="mb-3">

                            <input type="text" name="nombre_carga_familiar" class="form-control" id=""> 
                        </div>

                        <input type="submit" value="registrar_carga_familiar">
</form>
                    </div>
                </div>
            </div>
    </div>
    </form>

</div>
</body>
</html>