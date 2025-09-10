<?php

use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Propietario;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $vehiculos = Vehiculo::paginate(20);
    return view('vehiculos', [
        "vehiculos" => $vehiculos,
        "marcas" =>Marca::all(),
        "propietarios" => Propietario::all(),
    ]);
});
