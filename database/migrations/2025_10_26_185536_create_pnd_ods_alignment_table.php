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
        Schema::create('obj_institucional', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idPnd');
            $table->unsignedBigInteger('idOds');
            $table->unsignedBigInteger('idObjEstrategico');
            $table->string('nivel_alineacion')->default('Alto'); // Alto, Medio, Bajo
            $table->text('justificacion')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('idPnd')->references('idPnd')->on('pnd')->onDelete('cascade');
            $table->foreign('idOds')->references('idOds')->on('ods')->onDelete('cascade');
            $table->foreign('idObjEstrategico')->references('idObjEstrategico')->on('obj_estrategico')->onDelete('cascade');

            // Evitar duplicados
            $table->unique(['idPnd', 'idOds'], 'unique_pnd_ods');

            // Índices
            $table->index('idPnd');
            $table->index('idOds');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pnd_ods_alignment');
    }
};
