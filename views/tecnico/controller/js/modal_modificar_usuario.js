// Selección de elementos
const modal = document.getElementById('updateModal');
const openModalButton = document.getElementById('openModal');
const closeModalButton = document.querySelector('.btn-close');
const overlay = document.querySelector('.overlay');

// Abrir el modal
openModalButton.addEventListener('click', () => {
    modal.classList.add('show'); // Añadir clase 'show' para mostrar el modal
    overlay.classList.add('show'); // Añadir clase 'show' para mostrar la superposición
});

// Cerrar el modal al hacer clic en el botón de cerrar
closeModalButton.addEventListener('click', () => {
    modal.classList.remove('show'); // Quitar clase 'show' para ocultar el modal
    overlay.classList.remove('show'); // Quitar clase 'show' para ocultar la superposición
});

// Cerrar el modal al hacer clic en la superposición
overlay.addEventListener('click', () => {
    modal.classList.remove('show'); // Quitar clase 'show' para ocultar el modal
    overlay.classList.remove('show'); // Quitar clase 'show' para ocultar la superposición
});

// Manejo del envío del formulario
document.getElementById('updateForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevenir el comportamiento por defecto del formulario
    
    // Obtener los datos del formulario
    const formData = new FormData(this);
    const data = Object.fromEntries(formData.entries());

    // Realizar la llamada a tu API o backend para actualizar los datos
    fetch('tu_endpoint_de_actualizacion', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Success:', data);
        // Cerrar el modal después de la actualización
        
        modal.classList.remove('show'); // Quitar clase 'show' para ocultar el modal
        overlay.classList.remove('show'); // Quitar clase 'show' para ocultar la superposición
    })
    .catch((error) => {
        console.error('Error:', error);
    });
});