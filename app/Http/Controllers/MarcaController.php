<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarcaRequest;
use App\Models\Marca;

class MarcaController extends Controller
{
    function findById(Marca $marca){
        return response(["data" => $marca->toArray()]);
    }
    
    function create(MarcaRequest $request){
        $data = $request->validated();
        $new_marca = Marca::create($data);
        
        return response([
            "info" => "Marca creada correctamente",
            "data" => $new_marca->toArray(),
        ]);
    }
    
    function update(MarcaRequest $request, Marca $marca){
        $data = $request->validated();
        $marca->update($data);
        
        return response([
            "info" => "Marca Actualizada correctamente",
            "data" => $marca->toArray(),
        ]);
    }
    
    function delete(Marca $marca){
        $marca->delete();
        return response([
            "info" => "Marca eliminada correctamente",
            "data" => $marca->toArray(),
        ]);
    }
    
    function getAll(){
        return response(["data" => Marca::all()]);
    }
}
