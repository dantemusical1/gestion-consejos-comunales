// buscarMiembros.js
function buscarMiembros() {
    var input = document.getElementById('searchInput').value.toLowerCase();
    var rows = document.querySelectorAll('#miembrosTable tr');

    rows.forEach(function(row) {
        var cells = row.getElementsByTagName('td');
        var found = false;

        for (var i = 0; i < cells.length; i++) {
            if (cells[i].textContent.toLowerCase().indexOf(input) > -1) {
                found = true;
                break;
            }
        }

        if (found) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

// Evento para el botón de búsqueda
document.getElementById('searchButton').addEventListener('click', buscarMiembros);

// Evento para el campo de entrada (presionar "Enter")
document.getElementById('searchInput').addEventListener('keyup', function(event) {
    if (event.key === 'Enter') {
        buscarMiembros();
    }
});