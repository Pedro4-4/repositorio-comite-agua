<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contador extends Model
{
    use HasFactory;

    // Definir la tabla asociada a este modelo
    protected $table = 'contador';

    // Definir los campos que se pueden asignar de forma masiva
    protected $fillable = [
        'cliente_id',
        'precio_id',
        'sector_id',
        'codigo',
        'direccion'
    ];

    // Relaciones: Definir la relación con los modelos "Cliente" y "Precio"
    public function lecturas_sum()
    {
        return $this->hasOne(Lectura::class)
            ->selectRaw('contador_id, SUM(saldo) as saldo')
            ->where('estado', 0)
            ->groupBy('contador_id');
    }
    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sector_id');
    }

    public function lecturas()
    {
        return $this->hasMany(Lectura::class, 'contador_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    // // Un registro de Lectura pertenece a un Precio
    public function precio()
    {
        return $this->belongsTo(Precio::class, 'precio_id');
    }
}
