<?php

use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Propietario;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\Route;

Route::prefix("/v1")->group(function (){
    Route::prefix("/vehiculo")->controller(Vehiculo::class)->group(function(){
        Route::get("/{vehiculo}", "findById");
        Route::get("/", "getAll");
        Route::post("/", "create");
        Route::put("/{vehiculo}", "update");
        Route::delete("/{vehiculo}", "delete");
    });

    Route::prefix("/propietario")->controller(Propietario::class)->group(function(){
        Route::get("/{propietario}", "findById");
        Route::get("/", "getAll");
        Route::post("/", "create");
        Route::put("/{propietario}", "update");
        Route::delete("/{propietario}", "delete");
    });

    Route::prefix("/marca")->controller(Marca::class)->group(function(){
        Route::get("/{marca}", "findById");
        Route::get("/", "getAll");
        Route::post("/", "create");
        Route::put("/{marca}", "update");
        Route::delete("/{marca}", "delete");
    });

        Route::prefix("/modelo")->controller(Modelo::class)->group(function(){
        Route::get("/{modelo}", "findById");
        Route::get("/", "getAll");
        Route::post("/", "create");
        Route::put("/{modelo}", "update");
        Route::delete("/{modelo}", "delete");
    });
});