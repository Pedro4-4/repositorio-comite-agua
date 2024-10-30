<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'rol'; // Nombre de la tabla

    protected $fillable = [
        'usuario_id',
        'tipo_rol',
    ];

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    // Si el modelo tiene timestamps automáticos
    public $timestamps = true;
}
