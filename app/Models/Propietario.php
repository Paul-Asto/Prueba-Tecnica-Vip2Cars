<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Propietario extends Model
{
    use HasUuids;

    protected $fillable = [
        "id",
        "nombre",
        "apellidos",
        "correo",
        "telefono",
    ];

    protected $visible = [
        "id",
        "nombre",
        "apellidos",
        "correo",
        "telefono",
    ];

    function vehiculos(): HasMany{
        return $this->hasMany(Vehiculo::class);
    }
}
