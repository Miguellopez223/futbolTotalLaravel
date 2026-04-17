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
        // 1. Desactivamos la revisión de llaves foráneas
        Schema::disableForeignKeyConstraints();

        Schema::create('usuario_trabaja', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuarios_club_id')->constrained('usuarios_club');
            $table->char('tipo_usuario_club', 2);
            $table->foreignId('clubes_id')->constrained('clubes');
            $table->timestamps();
        });

        // 2. La volvemos a activar
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_trabaja');
    }
};
