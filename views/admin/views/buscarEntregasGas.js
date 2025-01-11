function buscarEntregasGas() {
    var input = document.getElementById('searchInput').value.toLowerCase();
    var rows = document.querySelectorAll('table tbody tr'); // Asegúrate de que estás seleccionando las filas de la tabla correcta

    rows.forEach(function(row) {
        var cells = row.getElementsByTagName('td');
        var found = false;

        // Verifica cada celda en la fila
        for (var i = 0; i < cells.length; i++) {
            if (cells[i].textContent.toLowerCase().indexOf(input) > -1) {
                found = true;
                break;
            }
        }

        // Muestra u oculta la fila según el resultado de la búsqueda
        if (found) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

// Evento para el botón de búsqueda
document.getElementById('searchButton').addEventListener('click', buscarEntregasGas);

// Evento para el campo de entrada (presionar "Enter")
document.getElementById('searchInput').addEventListener('keyup', function(event) {
    if (event.key === 'Enter') {
        buscarEntregasGas();
    }
});