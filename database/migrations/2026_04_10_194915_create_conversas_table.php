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
        Schema::create('conversas', function (Blueprint $table) {
            $table->id();
            $table->string('mensaje', 255);
            // Relaciones con la misma tabla (users)
            $table->foreignId('users_envia_id')->constrained('users');
            $table->foreignId('users_recibe_id')->constrained('users');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversas');
    }
};
