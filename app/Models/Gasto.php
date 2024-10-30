<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;

    protected $table = 'gasto'; // Nombre de la tabla

    protected $fillable = [
        'descripcion',
        'monto',
        'referencia',
    ];

    // Si el modelo tiene timestamps automáticos
    public $timestamps = true;
}
