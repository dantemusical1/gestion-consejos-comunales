// Función para validar la entrada de la contraseña
function validatePasswordInput() {
    const nuevaContrasena = document.getElementById('nueva_contrasena');
    const confirmarContrasena = document.getElementById('confirmar_contrasena');
    const passwordFeedback = document.querySelector('.invalid-feedback');
    const passwordValidFeedback = document.querySelector('.valid-feedback');

    // Verificar longitud mínima de la nueva contraseña
    if (nuevaContrasena.value.length < 5) {
        nuevaContrasena.classList.add('is-invalid');
        passwordFeedback.style.display = 'block';
        passwordValidFeedback.style.display = 'none';
    } else {
        nuevaContrasena.classList.remove('is-invalid');
        passwordFeedback.style.display = 'none';
        passwordValidFeedback.style.display = 'block';
    }

    // Verificar si las contraseñas coinciden
    if (nuevaContrasena.value !== confirmarContrasena.value) {
        confirmarContrasena.classList.add('is-invalid');
        passwordFeedback.style.display = 'none'; // Ocultar mensaje de longitud
    } else {
        confirmarContrasena.classList.remove('is-invalid');
    }
}

// Agregar eventos de entrada a los campos de contraseña
document.getElementById('nueva_contrasena').addEventListener('input', validatePasswordInput);
document.getElementById('confirmar_contrasena').addEventListener('input', validatePasswordInput);