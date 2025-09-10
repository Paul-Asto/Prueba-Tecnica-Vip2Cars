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
        <p id="info-errors" style="color: rgb(160, 17, 17)"></p>
        <h1>Tabla de Vehiculos</h1>
        @include('/componentes/table', $vehiculos)
        {{ $vehiculos->links()}}
    </div>


    
    

    
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script>

function updateOptionsOffSelect(select, newOptions){
            select.innerHTML = '<option value="" disabled selected>Elige una opcion</option>';
            newOptions.forEach(modelo => {
            const opcion = document.createElement('option');
            opcion.value = modelo["id"]
            opcion.textContent = modelo["nombre"];
            select.appendChild(opcion);
            });

            const selectModelosInstance = M.FormSelect.getInstance(select);
            selectModelosInstance.destroy();
            M.FormSelect.init(select);
}

document.addEventListener('DOMContentLoaded', function() {
    //Inicializa los select de Materialize CSS
    var elems = document.querySelectorAll('select');
    M.FormSelect.init(elems);


    // Manejo de evento Submid del formulario de creacion de Vehiculos
    let form = document.getElementById("form-create");

    form.addEventListener("submit", (event)=>{
        event.preventDefault(); 

        const formData = new FormData(event.target);
        let data = Object.fromEntries(formData.entries());

        fetch(`http://127.0.0.1:8000/api/v1/vehiculo`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(respuesta => {
            return respuesta.json()
        })
        .then(data => {
            if (data["message"]){
            let info_error = document.getElementById("info-errors")
            info_error.textContent = data["message"]
            }
            else{
                location.reload(true)
            }

            
            console.log(data)
        });
    })


    //Manejo de Actualizacion de input de busueda de propietarios
    const searchInput = document.getElementById('search_propietario');
    const data_propietarios = {!! json_encode(["data" => $propietarios->toArray()]) !!}["data"]
        .map((propietario)=>{
                return {
                    "id": propietario["id"],
                    "nombre": propietario["nombre"] + " " + propietario["apellidos"]
                }

            })

    searchInput.addEventListener('input', (event) => {
        const nuevoValor = event.target.value;
        console.log(nuevoValor)
        const select_update = document.getElementById("propietario");
        


        const newOptions = data_propietarios
            .filter((dato_propietario)=>{
                if (dato_propietario["nombre"].toLowerCase().includes(nuevoValor.toLowerCase())){
                    return true
                }
                return false
            })
        console.log(newOptions)

        updateOptionsOffSelect(select_update, newOptions)
    
        
    });


    // Manejo de eventos de los formulrios de eliminacion de vehiculos
    let delete_forms = document.getElementsByClassName("form-delete");

    for (let form of delete_forms){
        form.addEventListener("submit", (event)=>{
            event.preventDefault(); 
            fetch(`http://127.0.0.1:8000/api/v1/vehiculo/${event.target.id.value}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
            })
            .then(respuesta => {
                if (!respuesta.ok) {
                    throw new Error(`Error HTTP: ${respuesta.status}`);
                }
                
                return respuesta.json()
            })
            .then(data => {
                console.log(data)
            });
            location.reload(true); 
        })
    }

    //Manejo de evendo de actualizacion de select Marca
    const selectMarcas = document.getElementById('marca');

    selectMarcas.addEventListener('change', (event) => {
        const selectModelos = document.getElementById('modelo');
        const valorSeleccionado = event.target.value;

        fetch(`http://127.0.0.1:8000/api/v1/modelo/marca/${valorSeleccionado}`, {
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
            const modelos = data["data"]
            updateOptionsOffSelect(selectModelos, modelos)
        })

    });
});


</script>
</body>
</html>