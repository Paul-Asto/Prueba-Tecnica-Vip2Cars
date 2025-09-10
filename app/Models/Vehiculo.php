<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehiculo extends Model
{
    use HasUuids;
    
    protected $fillable = [
        "id",
        "placa",
        "año_fabricacion",
        "id_modelo",
        "id_propietario",
    ];
    
    protected $visible = [
        "id",
        "placa",
        "año_fabricacion",
        "id_modelo",
        "id_propietario",
    ];
    
    function propietario() :BelongsTo{
        return $this->belongsTo(Propietario::class, "id_propietario");
    }
    
    function modelo() :BelongsTo{
        return $this->belongsTo(Modelo::class, "id_modelo");
    }
}
