<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'contenido',
        'descripcion',
        'fecha_emision',
        'hora_publicacion',
        'autor',
        'img_noticia',
    ];
}
