
function confirmarGeneracion() {

    // Mostrar el mensaje de confirmación

    var confirmar = confirm("Si prosigue, generará un TXT de las entregas hasta el momento. ¿Desea continuar?");

    if (confirmar) {

        // Redirigir a la página si el usuario acepta

        window.location.href = "generar_txt_entrega_clap.php";

    }

}
