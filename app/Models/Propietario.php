<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

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
}
