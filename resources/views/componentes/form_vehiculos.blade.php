

<form id="from_create" class="teal lighten-5" method="POST">
    <label for="placa">Placa:</label>
    <input type="text" name="placa" value= "" required>
    <br>

    <label for="phone">Año de Fabricacion</label>
    <input type="text" name="año_fabricacion" value= "" required>
    <br>

    <label for="marca">Selecciona una marca:</label>
    <select  id="marca" name="marca" >
        <option value="" disabled selected>Elige una opcion</option>
        @foreach ($marcas as $marca)
            <option value="{{$marca->id}}">{{$marca->nombre}}</option>
        @endforeach
    </select>
    <br>

    <label for="modelo">Selecciona un modelo:</label>
    <select id="modelo"  name="modelo">
        <option value="" disabled selected>Elige una opcion</option>
    </select>
    <br>

    <label for="propietario">Selecciona un propietario:</label>
    <select id="propietario" name="propietario">
        <option value="" disabled selected>Elige una opcion</option>
        @foreach ($propietarios as $propietario)
            <option value="{{$propietario->id}}">{{$propietario->nombre . " " . $propietario->apellidos}}</option>
        @endforeach
    </select>
    <br>

    <button class="btn" type="submit">Enviar</button>
</form>