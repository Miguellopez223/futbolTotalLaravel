<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pruebas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_prueba');
            $table->time('hora_prueba');
            $table->foreignId('clubes_id')->constrained('clubes');
            $table->foreignId('usuarios_club_id')->constrained('usuarios_club');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pruebas');
    }
};
