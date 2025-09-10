<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModeloRequest;
use App\Models\Modelo;

class ModeloController extends Controller
{
    function findById(Modelo $modelo){
        return response(["data" => $modelo->toArray()]);
    }
    
    function create(ModeloRequest $request){
        $data = $request->validated();
        $new_modelo = Modelo::create($data);
        
        return response([
            "info" => "Modelo creado correctamente",
            "data" => $new_modelo->toArray(),
        ]);
    }
    
    function update(ModeloRequest $request, Modelo $modelo){
        $data = $request->validated();
        $modelo->update($data);
        
        return response([
            "info" => "Modelo Actualizado correctamente",
            "data" => $modelo->toArray(),
        ]);
    }
    
    function delete(Modelo $modelo){
        $modelo->delete();
        
        return response([
            "info" => "Modelo eliminado correctamente",
            "data" => $modelo->toArray(),
        ]);
    }
    
    function getAll(){
        return response(["data" => Modelo::all()]);
    }

    function getFromMarca(string $id_marca){
        return response(["data" => Modelo::where("id_marca", $id_marca)->get()]);
    }
}
