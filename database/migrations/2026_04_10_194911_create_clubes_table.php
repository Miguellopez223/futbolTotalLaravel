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
        Schema::create('clubes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_club', 15);
            $table->string('link_escudo', 255)->nullable();
            $table->foreignId('ciudad_id')->constrained('ciudades');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clubes');
    }
};
