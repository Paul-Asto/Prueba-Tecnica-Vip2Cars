<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Modelo extends Model
{
    protected $fillable = [
        "id",
        "nombre",
        "id_marca",
    ];
    
    protected $visible = [
        "id",
        "nombre",
        "id_marca",
    ];
    
    function marca() :BelongsTo{
        return $this->belongsTo(Marca::class);
    }
}
