<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Marca extends Model
{
    protected $fillable = [
        "id",
        "nombre",
    ];

    protected $visible = [
        "id",
        "nombre",
    ];

    function modelos(): HasMany{
        return $this->hasMany(Modelo::class, "id_marca");
    }
}
