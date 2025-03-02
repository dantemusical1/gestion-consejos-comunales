

function confirmarGeneracion() {

    // Mostrar el mensaje de confirmación

    var confirmar = confirm("Esta a punto de agregar una nueva entrega de gas propano ¿Desea continuar?");

    if (confirmar) {

        // Redirigir a la página si el usuario acepta

        window.location.href = "form_registro_entrega_gas.php";

    }

}

