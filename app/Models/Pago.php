<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $table = 'pago'; // Nombre de la tabla

    protected $fillable = [
        'descripcion',      
        'monto',
        'cobro_mensual',
        'saldo_anterior',
        'abono',
        'saldo_actual_fijo',
        'saldo_actual'


    ];

    // Si el modelo tiene timestamps automáticos
    public $timestamps = true;

    

}
