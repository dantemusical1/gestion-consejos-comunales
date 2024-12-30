<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/escudo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css"> 
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
include('menu-retroceder.php');

// Aquí deberías obtener el id_redes de la URL o de otra fuente
$id_redes = $_GET['id']; 

// Conexión a la base de datos
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = ""; 

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos actuales de la red
$sql = "SELECT * FROM redes WHERE id_redes = $id_redes";
$result = $conn->query($sql);
$red = $result->fetch_assoc();
?>

<div class="container">
    <div class="row justify-content-center pt-1 mt-5">
        <div class="col-md-5 formulario">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center card-title">Actualizar Redes</h5>
                </div>
                <div class="card-body pt-5">
                    <form method="post" action="../controller/actualizar_redes.php" autocomplete="off">
                        <input type="hidden" name="id_redes" value="<?php echo $red['id_redes']; ?>">

                        <div class="mb-3">
                            <div class="form-group">
                                <label>Página web <i class="bi bi-browser-edge"></i></label>
                                <input class="form-control" type="text" name="pag_web" value="<?php echo $red['pag_web']; ?>" placeholder="www.pag_consejocomunal.com" aria-label="default input example" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label>Facebook <i class="bi bi-facebook"></i></label>
                                <input class="form-control" type="text" name="facebook" value="<?php echo $red['facebook']; ?>" placeholder="Facebook" aria-label="default input example" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label>Grupo de WhatsApp <i class="bi bi-whatsapp"></i></label>
                                <input class="form-control" type="text" name="whatsapp" value="<?php echo $red['whatsapp']; ?>" placeholder="WhatsApp" aria-label="default input example" required>
                            </div>
                        </div>

                        <div class="form-group mx-4 pt-4 pb-4">
                            <button type="submit" class="btn btn-primary form-control" value="Enviar" name="btn_actualiza_redes">Actualizar Redes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>