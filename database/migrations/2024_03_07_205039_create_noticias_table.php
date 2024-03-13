<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo',100);
            $table->string('descripcion', 100);
            $table->string('contenido');
            $table->date('fecha_emision');
            $table->time('hora_publicacion');
            $table->string('autor', 150);
            $table->string('img_noticia',100)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('noticias');
    }
};
