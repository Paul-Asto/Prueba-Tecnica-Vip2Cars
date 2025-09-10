

<form id="form-create" class="teal lighten-5" method="POST">
    @csrf
    <label for="placa">Placa:</label>
    <input type="text" name="placa"  required>
    <br>

    <label for="año_fabricacion">Año de Fabricacion</label>
    <input type="text" name="año_fabricacion"  required>
    <br>

    <label for="id_marca">Selecciona una marca:</label>
    <select  id="marca" name="id_marca" >
        <option value="" disabled selected>Elige una opcion</option>
        @foreach ($marcas as $marca)
            <option value="{{$marca->id}}">{{$marca->nombre}}</option>
        @endforeach
    </select>
    <br>

    <label for="id_modelo">Selecciona un modelo:</label>
    <select id="modelo"  name="id_modelo">
        <option value="" disabled selected>Elige una opcion</option>
    </select>
    <br>

    <label for="id_propietario">Selecciona un propietario:</label>
    <select id="propietario" name="id_propietario">
        <option value="" disabled selected>Elige una opcion</option>
        @foreach ($propietarios as $propietario)
            <option value="{{$propietario->id}}">{{$propietario->nombre . " " . $propietario->apellidos}}</option>
        @endforeach
    </select>
    <br>

    <button id="btn-crear-vehiculo" class="btn" type="submit">Enviar</button>
</form>