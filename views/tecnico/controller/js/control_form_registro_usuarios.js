function validarFormulario() {
    const primerNombre = document.getElementById("primer_nombre").value;
    const primerApellido = document.getElementById("primer_apellido").value;
    const segundoApellido = document.getElementById("segundo_apellido").value;
    const correo = document.getElementById("correo").value;
    const password = document.getElementById("txtpassword").value;
    const confirmarPassword = document.getElementById("txtpassword_confirm").value;
    const rol = document.getElementById("rol").value;
  
    if (
      primerNombre === "" ||
      primerApellido === "" ||
      segundoApellido === "" ||
      correo === "" ||
      password === "" ||
      confirmarPassword === "" ||
      rol === ""
    ) {
      alert("Por favor, complete todos los campos obligatorios.");
      return false; // Impide el envío del formulario
    }
  
    if (!validarContrasenas(password, confirmarPassword)) {
      alert("Las contraseñas no coinciden.");
      return false; // Impide el envío del formulario
    }
  
    return true; 
  }
  
  function validarContrasenas(password, confirmarPassword) {
    return password === confirmarPassword;
  }
  
  document.querySelector("form").addEventListener("submit", function (event) {
    if (!validarFormulario()) {
      event.preventDefault(); // Evita el envío si la validación falla
    }
  });