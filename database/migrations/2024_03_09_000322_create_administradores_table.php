<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('administradores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->string('apellido_paterno',100);
            $table->string('apellido_materno',100);
            $table->string('usuario',100);
            $table->string('password',100);
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('administradores');
    }
};
