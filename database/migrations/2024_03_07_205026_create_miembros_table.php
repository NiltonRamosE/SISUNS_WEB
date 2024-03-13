<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('miembros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('apellido_paterno', 50);
            $table->string('apellido_materno', 50);
            $table->string('perfil_academico');
            $table->string('celular');
            $table->string('correo_institucional');
            $table->string('correo_personal')->nullable();
            $table->string('user_linkedin')->nullable();
            $table->string('user_github')->nullable();
            $table->string('user_instagram')->nullable();
            $table->string('tipo_miembro');
            $table->string('img_miembro', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('miembros');
    }
};
