function validarEntrada(event) {
    const input = event.target;
    // Permitir solo números
    input.value = input.value.replace(/[^0-9]/g, ''); // Reemplaza cualquier carácter que no sea un número

    // Verificar la longitud del valor ingresado
    const mensajeAdvertencia = document.getElementById("mensaje-advertencia");
    if (input.value.length < 5) {
        mensajeAdvertencia.style.display = 'inline'; // Mostrar el mensaje
    } else {
        mensajeAdvertencia.style.display = 'none'; // Ocultar el mensaje
    }

    // Llamar a la función de validación de longitud
    validarLongitudEntrada(event);
}

function validarLongitudEntrada(event) {
    const input = event.target;
    const valor = input.value;

    // Validar longitud del valor
    if (valor.length > 7 && valor.length < 12) {
        input.classList.remove('is-invalid');
        input.classList.add('is-valid');
    } else {
        input.classList.remove('is-valid');
        input.classList.add('is-invalid');
    }
}

function realizarBusqueda() {
    const cedula = document.getElementById('buscar_jefe_familiar').value;

    // Verificar si el campo de búsqueda está vacío
    if (cedula.trim() === '') {
        alert('No se puede buscar un campo vacío');
        return; // Salir de la función si el campo está vacío
    }

    // Aquí puedes agregar la lógica para realizar la búsqueda en la base de datos
    fetch('buscar_jefe.php?cedula=' + cedula)
        .then(response => response.json())
        .then(data => {
            if (data.existe) {
                alert('Lista la búsqueda para actualizar el jefe de familia.');
            } else {
                alert('El jefe de familia no existe o no está registrado en esta comuna.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Ocurrió un error al realizar la búsqueda.');
        });
}

function getCodigos() {
    let inputCP = document.getElementById("buscar_jefe_familiar").value;
    let lista = document.getElementById("lista");

    if (inputCP.length > 0) {
        let url = "inc/getCodigos.php"; // Cambia esta URL según tu estructura
        let formData = new FormData();
        formData.append("campo", inputCP);

        fetch(url, {
            method: "POST",
            body: formData,
            mode: "cors" // Default cors, no-cors, same-origin
        })
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                lista.style.display = 'block';
                lista.innerHTML = ''; // Limpiar la lista antes de agregar nuevos elementos
                data.forEach(item => {
                    const div = document.createElement('div');
                    div.textContent = item; // Asumiendo que 'item' es el texto que deseas mostrar
                    div.onclick = function() { mostrar(item); }; // Llama a la función mostrar al hacer clic
                    lista.appendChild(div);
                });
            } else {
                lista.style.display = 'none'; // Ocultar la lista si no hay resultados
            }
        })
        .catch(err => console.log(err));
    } else {
        lista.style.display = 'none'; // Ocultar la lista si el campo está vacío
    }
}

function mostrar(cp) {
    const lista = document.getElementById("lista");
    lista.style.display = 'none'; 
    document.getElementById("buscar_jefe_familiar").value = cp; // Rellenar el campo de entrada
}