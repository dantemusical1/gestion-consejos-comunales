    function validarFormulario() {
        var valid = true;
        var mensajesFaltantes = [];

        var primer_nombre = document.getElementById("primer_nombre").value.trim();
        var primer_apellido = document.getElementById("primer_apellido").value.trim();
        var segundo_apellido = document.getElementById("segundo_apellido").value.trim();
        var nacionalidad = document.getElementById("nacionalidad").value;
        var cedula = document.getElementById("cedula").value.trim();
        var genero = document.getElementById("genero") ? document.getElementById("genero").value : ""; // Asegúrate de que el campo exista
        var direccion = document.querySelector("input[placeholder='Dirección']").value.trim();
        var nro_casa = document.querySelector("input[placeholder='Nro de casa']").value.trim();
        var email = document.getElementById("email").value.trim();
        var telefono = document.getElementById("telefono").value.trim();
        var fecha_nacimiento = document.querySelector("input[name='fecha_nacimiento']").value.trim();

        // Verificar cada campo y agregar a mensajesFaltantes si está vacío
        if (!primer_nombre) mensajesFaltantes.push("Primer Nombre");
        if (!primer_apellido) mensajesFaltantes.push("Primer Apellido");
        if (!segundo_apellido) mensajesFaltantes.push("Segundo Apellido");
        if (!nacionalidad) mensajesFaltantes.push("Nacionalidad");
        if (!cedula) mensajesFaltantes.push("Cédula");
        if (!genero) mensajesFaltantes.push("Género");
        if (!direccion) mensajesFaltantes.push("Dirección");
        if (!nro_casa) mensajesFaltantes.push("Número de Casa");
        if (!email) mensajesFaltantes.push("Correo Electrónico");
        if (!telefono) mensajesFaltantes.push("Teléfono");
        if (!fecha_nacimiento) mensajesFaltantes.push("Fecha de Nacimiento");

        // Si hay campos faltantes, mostrar alerta
        if (mensajesFaltantes.length > 0) {
            valid = false;
            alert("Por favor, complete los siguientes campos:\n- " + mensajesFaltantes.join("\n- "));
        }

        return valid;
    }
