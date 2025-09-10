<?php

namespace App\Http\Controllers;
use App\Http\Requests\PropietarioRequest;
use App\Models\Propietario;

class PropietarioController extends Controller
{
    function findById(Propietario $propietario){
        return response(["data" => $propietario->toArray()]);
    }
    
    function create(PropietarioRequest $request){
        $data = $request->validated();
        $new_propietario = Propietario::create($data);
        
        return response([
            "info" => "Propietario creado correctamente",
            "data" => $new_propietario->toArray(),
        ]);
    }
    
    function update(PropietarioRequest $request, Propietario $propietario){
        $data = $request->validated();
        $propietario->update($data);
        
        return response([
            "info" => "Propietario Actualizado correctamente",
            "data" => $propietario->toArray(),
        ]);
    }
    
    function delete(Propietario $propietario){
        $propietario->delete();
        return response([
            "info" => "Propietario eliminado correctamente",
            "data" => $propietario->toArray(),
        ]);
    }
    
    function getAll(){
        return response(["data" => Propietario::all()]);
    }
}
