<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario'; // Nombre de la tabla

    protected $fillable = [
        'usario',  // Debe ser "usuario" si es un error tipográfico en la columna.
        'password',
    ];

    // Si el modelo tiene timestamps automáticos
    public $timestamps = true;

    // Método para encriptar la contraseña al guardar
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
