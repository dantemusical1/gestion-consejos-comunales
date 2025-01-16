<?php
session_start(); // Iniciar la sesión

// Inicializar variables para almacenar los datos
$primer_nombre = $segundo_nombre = $primer_apellido = $segundo_apellido = "";
$nacionalidad = $cedula = $direccion = $nro_casa = $email = $telefono = "";
$errores = [];

// Conexión a la base de datos
$servername = "localhost"; // Cambia esto si es necesario
$username = "root"; // Cambia esto por tu usuario de MySQL
$password = ""; /
$dbname = "consejos_comunales"; // Cambia esto por el nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si el formulario ha sido enviado

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger y limpiar los datos del formulario
    $primer_nombre = trim($_POST['primer_nombre']);
    $segundo_nombre = trim($_POST['segundo_nombre']);
    $primer_apellido = trim($_POST['primer_apellido']);
    $segundo_apellido = trim($_POST['segundo_apellido']);
    $nacionalidad = trim($_POST['nacionalidad']);
    $cedula = trim($_POST['cedula']);
    $direccion = trim($_POST['direccion']);
    $nro_casa = trim($_POST['nro_casa']);
    $email = trim($_POST['email']);
    $telefono = trim($_POST['telefono']);

    // Validaciones
    if (empty($primer_nombre)) {
        $errores[] = "El primer nombre es obligatorio.";
    }
    if (empty($primer_apellido)) {
        $errores[] = "El primer apellido es obligatorio.";
    }
    if (empty($telefono) || strlen($telefono) < 8) {
        $errores[] = "El teléfono es obligatorio y debe tener al menos 8 caracteres.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El correo electrónico no es válido.";
    }
    if (empty($nacionalidad)) {
        $errores[] = "La nacionalidad es obligatoria.";
    }
    if (empty($cedula) || !preg_match('/^\d{6,11}$/', $cedula)) {
        $errores[] = "La cédula debe tener entre 6 y 11 caracteres numéricos.";
    }

    // Si hay errores, redirigir al formulario con los errores
    if (!empty($errores)) {
        $_SESSION['errores'] = $errores; // Guardar errores en la sesión
        header("Location: formulario.php"); // Cambia 'formulario.php' por la ruta de tu formulario
        exit();
    }

    // Si no hay errores, verificar si la cédula ya existe en la base de datos
    $stmt = $conn->prepare("SELECT COUNT(*) FROM usuarios WHERE cedula = ?");
    $stmt->bind_param("s", $cedula);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        $_SESSION['errores'] = ["Ya existe un usuario con esta cédula."];
        header("Location: formulario.php"); // Cambia 'formulario.php' por la ruta de tu formulario
        exit();
    } else {
              // Aquí puedes insertar los datos en la base de datos
              $stmt = $conn->prepare("INSERT INTO usuarios (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, nacionalidad, cedula, direccion, nro_casa, email, telefono) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
              $stmt->bind_param("ssssssssss", $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $nacionalidad, $cedula, $direccion, $nro_casa, $email, $telefono);
      
              // Ejecutar la consulta
              if ($stmt->execute()) {
                  // Si la inserción fue exitosa, redirigir a la página del formulario con un mensaje de éxito
                  $_SESSION['mensaje'] = "Formulario enviado con éxito.";
                  header("Location: formulario.php"); // Cambia 'formulario.php' por la ruta de tu formulario
                  exit();
              } else {
                  // Si hubo un error al insertar, guardar el error en la sesión
                  $_SESSION['errores'] = ["Error al enviar el formulario: " . $stmt->error];
                  header("Location: formulario.php"); // Cambia 'formulario.php' por la ruta de tu formulario
                  exit();
              }
      
              // Cerrar la declaración
              $stmt->close();
          }
      }
      
      // Cerrar la conexión
      $conn->close();
      ?>