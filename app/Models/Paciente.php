<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'pacientes';

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'telefono',
        'email',
        'fecha_nacimiento',
        'direccion',
        'sexo',
        'alergias',
    ];

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}