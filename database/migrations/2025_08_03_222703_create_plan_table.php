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
        Schema::create('plan', function (Blueprint $table) {
            $table->id('idPlan');
            $table->string('codigo')->unique();
            $table->string('nombre');
            $table->text('entidad');
            $table->decimal('presupuesto', 12, 2);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('estado')->default('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan');
    }
};
