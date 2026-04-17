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
        Schema::create('clinica_de_pago', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha_inicio_clinica')->nullable();
            $table->timestamp('fecha_fin_clinica')->nullable();
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
        Schema::dropIfExists('clinica_de_pago');
    }
};
