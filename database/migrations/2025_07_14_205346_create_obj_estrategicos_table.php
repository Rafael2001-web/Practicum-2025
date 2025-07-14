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
        Schema::create('obj_estrategicos', function (Blueprint $table) {
            $table->id('idobj_estrategicos');
            $table->integer('codigo')->unique();
            $table->string('descripcion');
            $table->string('estado');
            $table->date('fechaRegistro');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obj_estrategicos');
    }
};
