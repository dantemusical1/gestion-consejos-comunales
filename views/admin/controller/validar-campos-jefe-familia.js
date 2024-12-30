function validarNombres() {

    const primerNombre = document.getElementById('primer_nombre');
    const segundoNombre = document.getElementById('segundo_nombre');
    const errorMessage = document.getElementById('error_message');


    // Limpiar mensaje de error

    errorMessage.style.display = 'none';
    errorMessage.textContent = '';


    // Validar que el primer nombre no esté vacío

    if (primerNombre.value.trim() === '') {

        errorMessage.textContent = 'El primer nombre es obligatorio.';

        errorMessage.style.display = 'block';

        return;

    }


    // Validar que el primer nombre no contenga números

    const nombreRegex = /^[A-Za-z]+$/; // Solo letras

    if (!nombreRegex.test(primerNombre.value)) {

        errorMessage.textContent = 'El primer nombre no puede contener números.';

        errorMessage.style.display = 'block';

        return;

    }


    // Validar que el segundo nombre, si se proporciona, no contenga números

    if (segundoNombre.value.trim() !== '' && !nombreRegex.test(segundoNombre.value)) {

        errorMessage.textContent = 'El segundo nombre no puede contener números.';

        errorMessage.style.display = 'block';

        return;

    }


    // Capitalizar la primera letra de ambos nombres

    primerNombre.value = capitalizar(primerNombre.value);

    segundoNombre.value = capitalizar(segundoNombre.value);

}


function capitalizar(nombre) {

    return nombre.charAt(0).toUpperCase() + nombre.slice(1).toLowerCase();

}




//Aqui se hace la validacion de la cedula de la persona


function validarCedula(input) {

    // Eliminar cualquier carácter que no sea un número

    input.value = input.value.replace(/[^0-9]/g, '');


    // Validar la longitud de la cadena

    const errorMessage = document.getElementById('cedulaError');

    if (input.value.length < 6 || input.value.length > 11) {

        errorMessage.style.display = 'block'; // Mostrar mensaje de error

    } else {

        errorMessage.style.display = 'none'; // Ocultar mensaje de error

    }

}


//Aqui se validan los apellidos


function validarApellidos() {

    const primerApellido = document.getElementById('primer_apellido');

    const segundoApellido = document.getElementById('segundo_apellido');

    const errorMessage = document.getElementById('error_message_apellidos');


    // Limpiar mensaje de error

    errorMessage.style.display = 'none';

    errorMessage.textContent = '';


    // Validar que el primer apellido no esté vacío

    if (primerApellido.value.trim() === '') {

        errorMessage.textContent = 'El primer apellido es obligatorio.';

        errorMessage.style.display = 'block';

        return;

    }


    // Validar que el primer apellido no contenga números ni espacios

    const apellidoRegex = /^[A-Za-z]+$/; // Solo letras

    if (!apellidoRegex.test(primerApellido.value)) {

        errorMessage.textContent = 'El primer apellido no puede contener números ni espacios.';

        errorMessage.style.display = 'block';

        return;

    }


    // Validar que el segundo apellido, si se proporciona, no contenga números ni espacios

    if (segundoApellido.value.trim() !== '' && !apellidoRegex.test(segundoApellido.value)) {

        errorMessage.textContent = 'El segundo apellido no puede contener números ni espacios.';

        errorMessage.style.display = 'block';

        return;

    }


    // Capitalizar la primera letra de ambos apellidos

    primerApellido.value = capitalizar(primerApellido.value);

    segundoApellido.value = capitalizar(segundoApellido.value);

}


function capitalizar(nombre) {

    return nombre.charAt(0).toUpperCase() + nombre.slice(1).toLowerCase();

}

//Validar correo electronico

function validarEmail() {

    const emailInput = document.getElementById('email');

    const errorMessage = document.getElementById('error_message_email');

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Expresión regular para validar el formato del correo


    // Limpiar mensaje de error

    errorMessage.style.display = 'none';

    errorMessage.textContent = '';


    // Validar el formato del correo electrónico

    if (!emailRegex.test(emailInput.value)) {

        errorMessage.textContent = 'Por favor, ingrese un correo electrónico válido.';

        errorMessage.style.display = 'block';

    }

}



//validar telefono 

function validarTelefono() {

    const telefonoInput = document.getElementById('telefono');

    const errorMessage = document.getElementById('error_message_telefono');

    const telefonoRegex = /^\d+$/; // Expresión regular para validar que solo contenga dígitos


    // Limpiar mensaje de error

    errorMessage.style.display = 'none';

    errorMessage.textContent = '';


    // Validar que el campo no esté vacío

    if (telefonoInput.value.trim() === '') {

        errorMessage.textContent = 'El teléfono es obligatorio.';

        errorMessage.style.display = 'block';

        return;

    }


    // Validar que el número tenga al menos 8 caracteres

    if (telefonoInput.value.length < 8) {

        errorMessage.textContent = 'El número de teléfono debe tener al menos 8 caracteres.';

        errorMessage.style.display = 'block';

        return;

    }


    // Validar que solo contenga dígitos

    if (!telefonoRegex.test(telefonoInput.value)) {

        errorMessage.textContent = 'El número de teléfono solo puede contener dígitos.';

        errorMessage.style.display = 'block';

        return;

    }

}
