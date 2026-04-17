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
    Schema::table('users', function (Blueprint $table) {
        $table->string('telefono_usuario', 20)->nullable();
        $table->string('doc_identidad_usuario', 20)->unique();
        $table->string('nombres', 35)->nullable();
        $table->string('apellidos', 35)->nullable();
        // Nota: Laravel por defecto usa varchar(255) para password, 
        // el diagrama dice 35, pero se sugiere dejar el de Laravel para el hash.
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
