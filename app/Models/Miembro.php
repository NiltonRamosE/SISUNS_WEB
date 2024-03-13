<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Miembro extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'perfil_academico',
        'correo_institucional',
        'correo_personal',
        'celular',
        'user_linkedin',
        'user_github',
        'user_instagram',
        'tipo_miembro',
        'img_miembro',
    ];
}
