<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <title>Registro de aldeas</title>
    
    <div class="container">
        <div class="row justify-content-center pt-1 mt-5">
                <div class="col-md-5 formulario">
                    <div class="card">
                        <div class="card-header">
                             <h5 class="text-center card-title">Registro de aldea</h5>
                        </div>
                
                        <div class="card-body pt-5">
          
                            <!--Aqui empieza el formulario-->
            <form action="controller/registro_aldeas.php" method="post">
            <form id="registro-aldeas">

<label for="estado">Estado:</label>

<select id="estado" name="estado">

    <option value="">Seleccione un estado</option>

    <!-- Aquí se llenarán los estados desde la base de datos -->

</select>


<label for="municipio">Municipio:</label>

<select id="municipio" name="municipio" disabled>

    <option value="">Seleccione un municipio</option>

</select>


<label for="nombre_aldea">Nombre de la Aldea:</label>

<input type="text" id="nombre_aldea" name="nombre_aldea" required>


<button type="submit">Registrar Aldea</button>

</form>


<script>

$(document).ready(function() {

    $('#estado').change(function() {

        var estado_id = $(this).val();

        if (estado_id) {

            $.ajax({

                url: 'get_municipios.php',

                type: 'GET',

                data: { estado_id: estado_id },

                dataType: 'json',

                success: function(data) {

                    $('#municipio').empty().append('<option value="">Seleccione un municipio</option>');

                    $.each(data, function(index, municipio) {

                        $('#municipio').append('<option value="' + municipio.id + '">' + municipio.nombre + '</option>');

                    });

                    $('#municipio').prop('disabled', false);

                }

            });

        } else {

            $('#municipio').empty().append('<option value="">Seleccione un municipio</option>').prop('disabled', true);

        }

    });

});

</script>




    <div class="form-group mx-4 pt-4 pb-4">
            <button type="submit" class="btn btn-primary form-control" value="Enviar" name="btnregistraraldea"> Iniciar sesion </button>	
    </div>

        </form>
</div>
</div>
</div>
</div>



</div>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>
</html>