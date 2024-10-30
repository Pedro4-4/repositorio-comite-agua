<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    protected $table = 'sector'; // Nombre de la tabla

    protected $fillable = [
        'nombre',
    ];

    // Si el modelo tiene timestamps automáticos
    public $timestamps = true;
}
