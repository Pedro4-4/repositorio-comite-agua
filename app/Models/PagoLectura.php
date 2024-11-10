<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagoLectura extends Model
{
    use HasFactory;

    protected $table = 'pago_lectura';

    protected $fillable = [
        'lectura_id',
        'pago_id',
        'monto'
    ];

    public $timestamps = true;

}
