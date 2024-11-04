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
        'abono',
        'lectura_id',
        'cliente'
    ];

    // Si el modelo tiene timestamps automáticos
    public $timestamps = true;

    public function lectura()
    {
        return $this->belongsTo(Lectura::class, 'lectura_id');
    }


}
