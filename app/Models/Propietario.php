<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Propietario extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        "id",
        "nombre",
        "apellidos",
        "correo",
        "telefono",
        "dni",
    ];

    protected $visible = [
        "id",
        "nombre",
        "apellidos",
        "correo",
        "telefono",
        "dni",
    ];

    function vehiculos(): HasMany{
        return $this->hasMany(Vehiculo::class, "id_propietario");
    }
}
