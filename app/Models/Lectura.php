<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lectura extends Model
{
    use HasFactory;

    protected $table = 'lectura'; // Nombre de la tabla

    protected $fillable = [
        'lectura_id',
        'contador_id',
        'precio_id',
        'lectura_anterior',
        'lectura_actual',
        'monto',
        'estado',
        'canon_mensual',
        'valor_exceso',
        'abono',
        'saldo',
        'nota',
        'total',
    ];
    
    // Relación con el modelo Lectura
    public function lectura()
    {
        return $this->belongsTo(Lectura::class);
    }

    public function contador()
    {
        return $this->belongsTo(Contador::class, 'contador_id');
    }
    public function precio()
    {
        return $this->belongsTo(Precio::class, 'precio_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    // Si el modelo tiene timestamps automáticos
    public $timestamps = true;
}


