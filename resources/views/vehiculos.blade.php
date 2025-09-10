<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de Vehiculos</title>
        <!-- Compiled and minified Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
    <div class="container">
        @include('/componentes/form_vehiculos', [
            "marcas" => $marcas,
            "propietarios" => $propietarios,
        ])

        @include('/componentes/table', $vehiculos)
        {{ $vehiculos->links()}}
    </div>


    
    

    
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    M.FormSelect.init(elems);
});


const selectMarcas = document.getElementById('marca');

selectMarcas.addEventListener('change', (event) => {
    const selectModelos = document.getElementById('modelo');
    const marcaSeleccionada = event.target.value;

    selectModelos.innerHTML = '<option value="" disabled selected>-- Elige un modelo --</option>';

    if (marcaSeleccionada) {
            fetch(`http://127.0.0.1:8000/api/v1/modelo/marca/${marcaSeleccionada}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            })
            .then(respuesta => {
                if (!respuesta.ok) {
                    throw new Error(`Error HTTP: ${respuesta.status}`);
                }
                return respuesta.json();
            })
            .then(data => {
                console.console.log(data);
                
                const modelos = data["data"]
                modelos.forEach(modelo => {
                const opcion = document.createElement('option');
                opcion.value = modelo["id"]
                opcion.textContent = modelo["nombre"];
                selectModelos.appendChild(opcion);
        });
            })
    }



});
</script>
</body>
</html>