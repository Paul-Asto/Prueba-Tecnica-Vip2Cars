<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
