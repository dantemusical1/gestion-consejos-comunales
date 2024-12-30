function verpassword(){
    var tipo = document.getElementById("txtpassword");
    if(tipo.type == "password")
    {
        tipo.type = "text";
    }
    else
    {
        tipo.type = "password";
    }
}

function validarPassword() {

    var password = document.getElementById("txtpassword").value;


    // Verificar la longitud de la contraseña

    if (password.length === 0) {

        alert("La contraseña no puede estar vacía.");

        return false; // Evitar el envío del formulario

    } else if (password.length < 4) {

        alert("La contraseña debe tener al menos 4 caracteres.");

        return false; // Evitar el envío del formulario

    }


    // Si la contraseña es válida, puedes continuar con el envío del formulario

    return true;

}