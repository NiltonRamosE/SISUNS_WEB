<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table = "administradores";
    use HasFactory;
    protected $fillable=[
        'usuario',
        'password'
    ];
}
