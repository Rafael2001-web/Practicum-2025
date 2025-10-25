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
        Schema::table('plan', function (Blueprint $table) {
            // Primero, cambiar el campo 'entidad' de TEXT a FK
            $table->dropColumn('entidad');
            $table->unsignedBigInteger('idEntidad')->after('nombre');
            $table->foreign('idEntidad')->references('idEntidad')->on('entidad')->onDelete('restrict');
            
            // Agregar índice para mejorar performance
            $table->index('idEntidad');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plan', function (Blueprint $table) {
            // Revertir cambios
            $table->dropForeign(['idEntidad']);
            $table->dropIndex(['idEntidad']);
            $table->dropColumn('idEntidad');
            $table->text('entidad')->after('nombre');
        });
    }
};
