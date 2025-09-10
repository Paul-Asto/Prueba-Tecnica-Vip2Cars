<?php

use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\VehiculoController;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Propietario;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\Route;

Route::prefix("/v1")->group(function (){
    Route::prefix("/vehiculo")->controller(VehiculoController::class)->group(function(){
        Route::get("/{vehiculo}", "findById");
        Route::get("/", "getAll");
        Route::post("/", "create");
        Route::put("/{vehiculo}", "update");
        Route::delete("/{vehiculo}", "delete");
    });

    Route::prefix("/propietario")->controller(PropietarioController::class)->group(function(){
        Route::get("/{propietario}", "findById");
        Route::get("/", "getAll");
        Route::post("/", "create");
        Route::put("/{propietario}", "update");
        Route::delete("/{propietario}", "delete");
    });

    Route::prefix("/marca")->controller(MarcaController::class)->group(function(){
        Route::get("/{marca}", "findById");
        Route::get("/", "getAll");
        Route::post("/", "create");
        Route::put("/{marca}", "update");
        Route::delete("/{marca}", "delete");
    });

        Route::prefix("/modelo")->controller(ModeloController::class)->group(function(){
        Route::get("/marca/{id_marca}", "getFromMarca");
        Route::get("/{modelo}", "findById");
        Route::get("/", "getAll");
        Route::post("/", "create");
        Route::put("/{modelo}", "update");
        Route::delete("/{modelo}", "delete");
    });
});