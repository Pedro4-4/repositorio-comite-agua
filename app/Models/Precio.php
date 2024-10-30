<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    use HasFactory;

    protected $table = 'precio'; // Nombre de la tabla

    protected $fillable = [
        'descripcion',
        'monto',
        'responsable',
    ];

        // Relación con el modelo Cliente
        public function usuario()
        {
            return $this->belongsTo(User::class, 'responsable');
        }
    // Si el modelo tiene timestamps automáticos (Laravel lo hace por defecto)
    public $timestamps = true;
}
