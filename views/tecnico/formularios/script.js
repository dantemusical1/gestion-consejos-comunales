document.addEventListener('DOMContentLoaded', function() {
    const estadoSelect = document.getElementById('estado');
    const municipioSelect = document.getElementById('municipio');
    const comunaSelect = document.getElementById('comuna');
    const aldeaSelect = document.getElementById('aldea');
    const nombreConsejoInput = document.getElementById('nombreConsejo');
    const submitButton = document.querySelector('button[type="submit"]');

    // Load states from the database
    fetch('getStates.php')
        .then(response => response.json())
        .then(data => {
            data.forEach(estado => {
                const option = document.createElement('option');
                option.value = estado.id;
                option.textContent = estado.nombre; // Cambiado a 'nombre'
                estadoSelect.appendChild(option);
            });
        });

    // Event listener for estado selection
    estadoSelect.addEventListener('change', function() {
        const estadoId = this.value;
        municipioSelect.innerHTML = '<option value="" disabled selected>Seleccione un municipio</option>';
        comunaSelect.innerHTML = '<option value="" disabled selected>Seleccione una comuna</option>';
        aldeaSelect.innerHTML = '<option value="" disabled selected>Seleccione una aldea</option>';
        nombreConsejoInput.disabled = true;
        submitButton.disabled = true;

        fetch(`getMunicipios.php?estadoId=${estadoId}`)
            .then(response => response.json())
            .then(data => {
                data.forEach(municipio => {
                    const option = document.createElement('option');
                    option.value = municipio.id;
                    option.textContent = municipio.nombre; // Cambiado a 'nombre'
                    municipioSelect.appendChild(option);
                });
                municipioSelect.disabled = false;
            });
    });

    // Event listener for municipio selection
    municipioSelect.addEventListener('change', function() {
        const municipioId = this.value;
        comunaSelect.innerHTML = '<option value="" disabled selected>Seleccione una comuna</option>';
        aldeaSelect.innerHTML = '<option value="" disabled selected>Seleccione una aldea</option>';
        nombreConsejoInput.disabled = true;
        submitButton.disabled = true;

        fetch(`getComunas.php?municipioId=${municipioId}`)
            .then(response => response.json())
            .then(data => {
                data.forEach(comuna => {
                    const option = document.createElement('option');
                    option.value = comuna.id;
                    option.textContent = comuna.nombre; // Cambiado a 'nombre'
                    comunaSelect.appendChild(option);
                });
                comunaSelect.disabled = false;
            });
    });

    // Event listener for comuna selection
    comunaSelect.addEventListener('change', function() {
        const comunaId = this.value;
        aldeaSelect.innerHTML = '<option value="" disabled selected>Seleccione una aldea</option>';
        nombreConsejoInput.disabled = true;
        submitButton.disabled = true;

        fetch(`getAldea.php?comunaId=${comunaId}`)
            .then(response => response.json())
            .then(data => {
                data.forEach(aldea => {
                    const option = document.createElement('option');
                    option.value = aldea.id;
                    option.textContent = aldea.nombre; // Cambiado a 'nombre'
                    aldeaSelect.appendChild(option);
                });
                aldeaSelect.disabled = false;
            });
    });

    // Event listener for aldea selection
    aldeaSelect.addEventListener('change', function() {
        nombreConsejoInput.disabled = false;
        submitButton.disabled = false;
    });
});
