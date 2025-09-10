<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehiculoRequest;
use App\Models\Vehiculo;

class VehiculoController extends Controller
{
    function findById(Vehiculo $vehiculo){
        return response(["data" => $vehiculo->toArray()]);
    }
    
    function create(VehiculoRequest $request){
        $data = $request->validated();
        $new_vehiculo = Vehiculo::create($data);
        
        return response([
            "info" => "Vehiculo creado correctamente",
            "data" => $new_vehiculo->toArray(),
        ]);
    }
    
    function update(VehiculoRequest $request, Vehiculo $vehiculo){
        $data = $request->validated();
        $vehiculo->update($data);
        
        return response([
            "info" => "Vehiculo Actualizado correctamente",
            "data" => $vehiculo->toArray(),
        ]);
    }
    
    function delete(Vehiculo $vehiculo){
        $vehiculo->delete();
        
        return response([
            "info" => "Vehiculo eliminado correctamente",
            "data" => $vehiculo->toArray(),
        ]);
    }
    
    function getAll(){
        return response(["data" => Vehiculo::all()]);
    }
}
