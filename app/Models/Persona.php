<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table='persona';

    protected $primaryKey = 'id';

    public $timestamps = true;
    protected $fillable = [
        'nombre',
        'apellido',
        'dpi',
        'telefono',
        'direccion',
        'observacion'
    ];
   
}
