<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'cliente'; // Nombre de la tabla

    protected $fillable = [
        'sector_id',
        'nombre',
        'apellido',
        'dpi',
        'telefono',
        'direccion',
        'observacion',
    ];

    // Relación con el modelo Sector
  

    public function contadores()
    {
        return $this->hasMany(Contador::class, 'cliente_id');
    }
    


    // // Si el modelo tiene timestamps automáticos
    // public $timestamps = true;
}
