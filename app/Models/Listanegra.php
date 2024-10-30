<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaNegra extends Model
{
    use HasFactory;

    protected $table = 'lista_negra'; // Nombre de la tabla

    protected $fillable = [
        'cliente_id',
        'fecha',
    ];

    // Relación con el modelo Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // Si el modelo tiene timestamps automáticos
    public $timestamps = true;
}
