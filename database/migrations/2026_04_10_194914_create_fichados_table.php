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
        Schema::create('fichados', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha_fichaje')->nullable();
            $table->timestamp('fecha_final_fichaje')->nullable();
            $table->foreignId('jugadores_id')->constrained('jugadores');
            $table->foreignId('clubes_id')->constrained('clubes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fichados');
    }
};
