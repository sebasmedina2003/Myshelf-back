<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('imagen');
            $table->string('genero');
            $table->date('fecha_publicacion');
            $table->float('calificacion');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
